@extends('layouts.app')

@section('title', 'Edit Permission')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
                Edit Permission
            </h2>
            <a href="{{ route('permissions.index') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Back to List
            </a>
        </div>

        <div class="max-w-2xl mx-auto bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">
                                Permission Name
                            </label>
                            <input 
                                name="name" 
                                id="name" 
                                value="{{ old('name', $permission->name) }}" 
                                placeholder="Enter Permission Name" 
                                type="text" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                            >
                            @error('name')
                                <p class="text-rose-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button 
                                type="submit" 
                                class="bg-emerald-600 text-white px-6 py-3 rounded-full hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition duration-300 ease-in-out shadow-md"
                            >
                                Update Permission
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Optional: Add client-side validation or interactions
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('name');
        
        nameInput.addEventListener('input', function() {
            // Example: Real-time validation
            if (this.value.length > 0) {
                this.classList.remove('border-red-500');
                this.classList.add('border-emerald-500');
            } else {
                this.classList.remove('border-emerald-500');
                this.classList.add('border-red-500');
            }
        });
    });
</script>
@endpush