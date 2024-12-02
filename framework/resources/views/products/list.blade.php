    @extends('layouts.app')

    @section('title', 'Products')

    @section('content')
    <div class="min-h-screen bg-white p-8">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">
                    Product Management
                </h2>
                <a href="{{ route('products.create') }}" 
                class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                    Create New Product
                </a>
            </div>

            <!-- Komponen pesan -->
            @include('components.message')

            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
                <div class="p-8">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100 border-b-2 border-emerald-200">
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Quality</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Origin</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Total Quantity</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Created At</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-emerald-800 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr class="hover:bg-emerald-50 transition duration-200 border-b border-gray-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <span class="
                                                {{ $product->quality == 'Tinggi' ? 'bg-green-100 text-green-800' : 
                                                ($product->quality == 'Sedang' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }} 
                                                px-2 py-1 rounded-full text-xs">
                                                {{ $product->quality }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->origin }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <span class="{{ $product->quantity > 10 ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $product->quantity }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $product->created_at->format('Y-m-d H:i:s') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                            <a href="{{ route('products.edit', $product->id) }}"
                                            class="inline-block px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition duration-300 ease-in-out">
                                                Edit
                                            </a>

                                            <button onclick="deleteProduct({{ $product->id }})"
                                                class="px-4 py-2 bg-rose-500 text-white rounded-lg hover:bg-rose-600 transition duration-300 ease-in-out">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No products found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function deleteProduct(id) {
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
                fetch(`/products/${id}`, {
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
                            'Product has been deleted.',
                            'success'
                        ).then(() => {
                            // Reload atau redirect
                            window.location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Failed!',
                            data.message || 'Failed to delete Product.',
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