<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Stock
            </h2>
            <a href="{{ route('stock.index') }}" class="bg-slate-700 rounded-md text-white px-4 py-2">Back to List</a>
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('stock.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="product_id" class="text-lg font-medium">Product</label>
                            <select name="product_id" id="product_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="type" class="text-lg font-medium">Type</label>
                            <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                <option value="">Select Type</option>
                                <option value="in" {{ old('type') == 'in' ? 'selected' : '' }}>In</option>
                                <option value="out" {{ old('type') == 'out' ? 'selected' : '' }}>Out</option>
                            </select>
                            @error('type')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="quantity" class="text-lg font-medium">Quantity</label>
                            <input name="quantity" id="quantity" value="{{ old('quantity') }}" type="number" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                            @error('quantity')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="source" class="text-lg font-medium">Source</label>
                            <input name="source" id="source" value="{{ old('source') }}" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                            @error('source')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="destination" class="text-lg font-medium">Destination</label>
                            <input name="destination" id="destination" value="{{ old('destination') }}" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                            @error('destination')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="date" class="text-lg font-medium">Date</label>
                            <input name="date" id="date" value="{{ old('date') }}" type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                            @error('date')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="note" class="text-lg font-medium">Note</label>
                            <textarea name="note" id="note" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">{{ old('note') }}</textarea>
                            @error('note')
                                <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500">
                                Create Stock
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>