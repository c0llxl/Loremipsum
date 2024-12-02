@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
                Create Product
            </h2>
            <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Back to List
            </a>
        </div>

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('products.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                            <input 
                                name="name" 
                                id="name" 
                                value="{{ old('name') }}" 
                                placeholder="Enter Product Name" 
                                type="text" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                            @error('name')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Type</label>
                            <input 
                                name="type" 
                                id="type" 
                                value="{{ old('type') }}" 
                                placeholder="Enter Product Type" 
                                type="text" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                            @error('type')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="quality" class="block text-sm font-semibold text-gray-700 mb-2">Quality</label>
                            <select 
                                name="quality" 
                                id="quality" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                                <option value="">Select Quality</option>
                                <option value="Tinggi" {{ old('quality') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                <option value="Sedang" {{ old('quality') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="Rendah" {{ old('quality') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                            </select>
                            @error('quality')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="origin" class="block text-sm font-semibold text-gray-700 mb-2">Origin</label>
                            <input 
                                name="origin" 
                                id="origin" 
                                value="{{ old('origin') }}" 
                                placeholder="Enter Product Origin" 
                                type="text" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                            @error('origin')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            placeholder="Enter Product Description" 
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div>
                        <label for="Total quantity" class="block text-sm font-semibold text-gray-700 mb-2">Quantity</label>
                        <input 
                            name="quantity" 
                            id="quantity" 
                            value="{{ old('quantity', 0) }}" 
                            type="number" 
                            min="0" 
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                        >
                        @error('quantity')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full bg-blue-600 text-white py-4 rounded-xl hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg"
                        >
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection