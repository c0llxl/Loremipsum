<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                EDIT / USERS
            </h2>
            <a href="{{ route('users.index') }}" class="bg-slate-700 rounded-md text-white px-4 py-2">Back to List</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <a href="{{ route('users.index') }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            List    
                        </a>
                    </div>
                    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                        @csrf
                        @if(isset($user))
                            @method('PATCH')
                        @endif
                        <div>
                            <label for="name" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input name="name" id="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Enter Name" type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="email" class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input name="email" id="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Enter Email" type="email" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-black">
                                @error('email')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <h3 class="font-semibold text-lg">Roles</h3>
                                <div class="grid grid-cols-4 gap-4 mt-2">
                                    @foreach($roles as $role)
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" class="form-checkbox" name="roles[]" value="{{ $role->id }}"
                                                    {{ in_array($role->id, $hasRole) ? 'checked' : '' }}>
                                                <span class="ml-2">{{ $role->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>