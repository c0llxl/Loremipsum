@extends('layouts.app')

@section('title', 'Users Management')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
                Users Management
            </h2>
            {{-- <a href="{{ route('users.create') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Create New User
            </a> --}}
        </div>

        <!-- Komponen pesan -->
        @include('components.message')

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b-2 border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">User</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Roles</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-800 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="hover:bg-gray-50 transition duration-200 border-b border-gray-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <img 
                                                src="{{ $user->profile_image }}" 
                                                alt="{{ $user->name }}" 
                                                class="w-10 h-10 rounded-full object-cover"
                                            />
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($user->roles as $role)
                                                <span class="bg-emerald-100 text-emerald-800 px-2 py-1 rounded-full text-xs">
                                                    {{ $role->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $user->created_at->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                           class="inline-block px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                                            Edit
                                        </a>
                                        <button onclick="deleteUser({{ $user->id }})"
                                            class="px-4 py-2 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition duration-300 ease-in-out">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No users found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Sisa script tetap sama -->