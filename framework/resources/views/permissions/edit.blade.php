<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Permission
            </h2>
            <a href="{{ route('permissions.index') }}" class="bg-slate-700 rounded-md text-white px-4 py-2">Back to List</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="text-lg font-medium">Name</label>
                                <input name="name" id="name" value="{{ old('name', $permission->name) }}" placeholder="Enter Permission Name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-black">
                                @error('name')
                                    <p class="text-red-400 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500">
                                    Update Permission
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>