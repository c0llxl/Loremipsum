@extends('layouts.app')

@section('title', 'Stock Management')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
                Stock Management
            </h2>
            <a href="{{ route('stock.create') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                Create New Stock Entry
            </a>
        </div>

        <!-- Komponen pesan -->
        @include('components.message')

        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100 border-b-2 border-emerald-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Product</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Source</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Destination</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stocks as $stock)
                                <tr class="hover:bg-emerald-50 transition duration-200 border-b border-gray-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $stock->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $stock->product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $stock->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($stock->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $stock->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $stock->source ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $stock->destination ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $stock->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                        <a href="{{ route('stock.edit', $stock->id) }}"
                                           class="inline-block px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                                            Edit
                                        </a>
                                        <button onclick="deleteStock({{ $stock->id }})"
                                            class="px-4 py-2 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition duration-300 ease-in-out">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No stock records found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $stocks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteStock(id) {
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
            // Gunakan fetch atau axios untuk delete
            fetch(`/stock/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire(
                        'Deleted!',
                        'Stock has been deleted.',
                        'success'
                    ).then(() => {
                        // Reload atau redirect
                        window.location.reload();
                    });
                } else {
                    Swal.fire(
                        'Failed!',
                        data.message || 'Failed to delete stock.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire(
                    'Error!',
                    'An error occurred. Please try again.',
                    'error'
                );
            });
        }
    });
}
</script>
@endpush   
