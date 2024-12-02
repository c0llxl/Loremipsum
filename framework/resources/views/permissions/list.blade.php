@extends('layouts.app')

@section('title', 'Permissions')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
                Permissions Management
            </h2>
            <a href="{{ route('permissions.create') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Create New Permission
            </a>
        </div>

        <!-- Komponen pesan -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100 border-b-2 border-emerald-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Created At</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($permissions as $permission)
                                <tr class="hover:bg-emerald-50 transition duration-200 border-b border-gray-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $permission->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $permission->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $permission->created_at->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                        <a href="{{ route('permissions.edit', $permission->id) }}"
                                           class="inline-block px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                                            Edit
                                        </a>

                                        <button onclick="deletePermission({{ $permission->id }})"
                                            class="px-4 py-2 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition duration-300 ease-in-out">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No permissions found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function deletePermission(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/permissions/${id}`)
                .then(response => {
                    if (response.data.success) {
                        Swal.fire(
                            'Deleted!',
                            'Permission has been deleted.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Failed!',
                            response.data.message || 'Failed to delete permission.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    Swal.fire(
                        'Error!',
                        'An error occurred. Please try again.',
                        'error'
                    );
                    console.error('Error:', error);
                });
        }
    });
}
</script>
@endpush
