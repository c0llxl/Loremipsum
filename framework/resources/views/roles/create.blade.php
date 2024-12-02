@extends('layouts.app')

@section('title', 'Create Role')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto max-w-4xl">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-emerald-800">
                Create New Role
            </h2>
            <a href="{{ route('roles.index') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Back to Roles List
            </a>
        </div>

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('roles.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-lg font-semibold text-emerald-800 mb-2">
                            Role Name
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') }}" 
                            placeholder="Enter Role Name" 
                            class="w-full px-4 py-3 border border-emerald-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 transition duration-300"
                        >
                        @error('name')
                            <p class="text-rose-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-emerald-800 mb-4">
                            Assign Permissions
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center">
                                        <input 
                                            type="checkbox" 
                                            id="permission-{{ $permission->id }}" 
                                            name="permission[]" 
                                            value="{{ $permission->name }}"
                                            class="form-checkbox h-5 w-5 text-emerald-600 rounded focus:ring-emerald-500 border-gray-300"
                                        >
                                        <label 
                                            for="permission-{{ $permission->id }}" 
                                            class="ml-3 text-sm text-gray-700"
                                        >
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="pt-6">
                        <button 
                            type="submit" 
                            class="w-full bg-emerald-600 text-white py-3 rounded-lg hover:bg-emerald-700 transition duration-300 ease-in-out transform hover:scale-102 shadow-lg"
                        >
                            Create Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection