@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto max-w-4xl">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-emerald-800">
                {{ isset($user) ? 'Edit User' : 'Create User' }}
            </h2>
            <a href="{{ route('users.index') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Back to List
            </a>
        </div>

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf
                    @if(isset($user))
                        @method('PATCH')
                    @endif

                    <div class="mb-4">
                        <label for="img" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                        <input
                            type="file"
                            name="img"
                            id="img"
                            accept="image/*"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        />
                        @if(isset($user) && $user->img)
                            <img src="{{ $user->image_url }}" 
                                 alt="User Image" 
                                 class="mt-3 w-20 h-20 object-cover rounded-full"
                            >
                        @endif
                        @error('img')
                            <p class="text-rose-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-lg font-semibold text-emerald-800 mb-2">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name', $user->name ?? '') }}" 
                            placeholder="Enter Name" 
                            class="w-full px-4 py-3 border border-emerald-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 transition duration-300"
                        >
                        @error('name')
                            <p class="text-rose-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-lg font-semibold text-emerald-800 mb-2"> Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email', $user->email ?? '') }}" 
                            placeholder="Enter Email" 
                            class="w-full px-4 py-3 border border-emerald-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 transition duration-300"
                        >
                        @error('email')
                            <p class="text-rose-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Roles Section -->
                    <div>
                        <h3 class="text-lg font-semibold text-emerald-800 mb-4">Assign Roles</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach($roles as $role)
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        name="roles[]" 
                                        value="{{ $role->id }}" 
                                        id="role-{{ $role->id }}"
                                        class="form-checkbox h-5 w-5 text-emerald-600 rounded focus:ring-emerald-500 border-gray-300"
                                        {{ in_array($role->id, $hasRole ?? []) ? 'checked' : '' }}
                                    >
                                    <label 
                                        for="role-{{ $role->id }}" 
                                        class="ml-3 text-sm text-gray-700"
                                    >
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button 
                            type="submit" 
                            class="w-full bg-emerald-600 text-white py-3 rounded-lg hover:bg-emerald-700 transition duration-300 ease-in-out transform hover:scale-102 shadow-lg"
                        >
                            {{ isset($user) ? 'Update User' : 'Create User' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input[type="text"], input[type="email"]');

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                // Remove error styling when user starts typing
                this.classList.remove('border-rose-500');
            });
        });

        form.addEventListener('submit', function(e) {
            let hasError = false;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    hasError = true;
                    input.classList.add('border-rose-500');
                }
            });

            if (hasError) {
                e.preventDefault();
                // Optional: Show a general error message
            }
        });
    });
</script>
@endpush    