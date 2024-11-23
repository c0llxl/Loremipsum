<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Product
            </h2>
            <a href="{{ route('products.index') }}" class="bg-slate-700 rounded-md text-white px-4 py-2">Back to List</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="text-lg font-medium">ID</label>
                                <input name="name" id="name" value="{{ old('name') }}" placeholder="Enter Product Name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                @error('name')
                                    <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="type" class="text-lg font-medium">Name</label>
                                <input name="type" id="type" value="{{ old('type') }}" placeholder="Enter Product Type" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                @error('type')
                                    <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="quality" class="text-lg font-medium">Quality</label>
                                <select name="quality" id="quality" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                    <option value="">Select Quality</option>
                                    <option value="Tinggi" {{ old('quality') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                    <option value="Sedang" {{ old('quality') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                    <option value="Rendah" {{ old('quality') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                                </select>
                                @error('quality')
                                    <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="origin" class="text-lg font-medium">Origin</label>
                                <input name="origin" id="origin" value="{{ old('origin') }}" placeholder="Enter Product Origin" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                @error('origin')
                                    <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="text-lg font-medium">Description</label>
                                <textarea name="description" id="description" rows="3" placeholder="Enter Product Description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="quantity" class="text-lg font-medium">Quantity</label>
                                <input name="quantity" id="quantity" value="{{ old('quantity', 0) }}" type="number" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                @error('quantity')
                                    <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500">
                                    Create Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>