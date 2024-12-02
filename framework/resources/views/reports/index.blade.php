@extends('layouts.app')

@section('title', 'Reports')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Stocks and Products Reports</h1>
                    <a href="{{ route('reports.pdf') }}" 
                       class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-full transition duration-300 ease-in-out shadow-md">
                        Download PDF
                    </a>
                </div>
                
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Reports</h1>

                <!-- Tabel Produk -->
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Products</h2>
                <div class="overflow-x-auto mb-8">
                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Name</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Type</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Total Quantity</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Origin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $product->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $product->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $product->type }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $product->quantity }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $product->origin }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tabel Stok -->
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Stocks</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Product</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Type</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Quantity</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Source</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Destination</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $stock)
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $stock->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $stock->product->name ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">
                                        <span class="px-2 inline-block rounded-full 
                                            {{ $stock->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($stock->type) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $stock->quantity }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $stock->source ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $stock->destination ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-600">{{ $stock->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
