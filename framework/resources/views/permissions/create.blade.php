@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg">
        <form action="{{ route('permissions.store') }}" method="POST" class="p-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">
                    Permission Name
                </label>
                <input 
                    name="name" 
                    id="name" 
                    value="{{ old('name') }}" 
                    placeholder="Enter Permission Name" 
                    type="text" 
                    class="w-full px-4 py-3 border rounded-lg transition duration-300 
                        {{ $errors->has('name') 
                            ? 'border-rose-500 text-rose-600 focus:ring-rose-500 focus:border-rose-500' 
                            : 'border-gray-300 focus:ring-emerald-500 focus:border-emerald-500' }}"
                >
                @error('name')
                    <p class="text-rose-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="w-full bg-emerald-600 text-white py-3 rounded-lg hover:bg-emerald-700">
                Create Permission
            </button>
        </form>
    </div>
</div>
@endsection