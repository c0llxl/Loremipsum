@extends('layouts.app')

@section('title', 'Edit Stock Transaction')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
                Edit Stock Transaction
            </h2>
            <a href="{{ route('stock.index') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Back to List
            </a>
        </div>

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('stock.update', $stock->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PATCH')

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="product_id" class="block text-sm font-semibold text-gray-700 mb-2">Product</label>
                            <select 
                                name="product_id" 
                                id="product_id" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $stock->product_id) == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Transaction Type</label>
                            <select 
                                name="type" 
                                id="type" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                                <option value="">Select Type</option>
                                <option value="in" {{ old('type', $stock->type) == 'in' ? 'selected' : '' }}>Stock In</option>
                                <option value="out" {{ old('type', $stock->type) == 'out' ? 'selected' : '' }}>Stock Out</option>
                            </select>
                            @error('type')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="quantity" class="block text-sm font-semibold text-gray-700 mb-2">Quantity</label>
                            <input 
                                name="quantity" 
                                id="quantity" 
                                value="{{ old('quantity', $stock->quantity) }}" 
                                type="number" 
                                min="1" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                            @error('quantity')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Transaction Date</label>
                            <input 
                                name="date" 
                                id="date" 
                                value="{{ old('date', $stock->date) }}" 
                                type="date" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            >
                            @error('date')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="source" class="block text-sm font-semibold text-gray-700 mb-2">Source</label>
                            <input 
                                name="source" 
                                id="source" 
                                value="{{ old('source', $stock->source) }}" 
                                type="text" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                                placeholder="Enter source location/supplier"
                            >
                            @error('source')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="destination" class="block text-sm font-semibold text-gray-700 mb-2">Destination</label>
                            <input 
                                name="destination" 
                                id="destination" 
                                value="{{ old('destination', $stock->destination) }}" 
                                type="text" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                                placeholder="Enter destination location"
                            >
                            @error('destination')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="note" class="block text-sm font-semibold text-gray-700 mb-2">Note</label>
                        <textarea 
                            name="note" 
                            id="note" 
                            rows="4" 
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                            placeholder="Enter additional notes"
                        >{{ old('note', $stock->note) }}</textarea>
                        @error('note')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="pt-4">
                        <button 
                            type="submit" 
                            class="w-full bg-blue-600 text-white py-4 rounded-xl hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 shadow-lg"
                        >
                            Update Stock Transaction
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
