@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-white p-8">
    <div class="container mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">
                Dashboard Overview
            </h2>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Stock Card -->
            <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-emerald-500 bg-opacity-10">
                        <svg class="h-8 w-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-800">{{ number_format($totalStock) }}</h3>
                        <p class="text-emerald-600 font-medium">Total Stock Items</p>
                    </div>
                </div>
            </div>

            <!-- Total Products Card -->
            <div class="bg-gradient-to-br from-sky-50 to-sky-100 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-sky-500 bg-opacity-10">
                        <svg class="h-8 w-8 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-800">{{ number_format($totalProducts) }}</h3>
                        <p class="text-sky-600 font-medium">Total Products</p>
                    </div>
                </div>
            </div>

            <!-- Low Stock Alert Card -->
            <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-rose-500 bg-opacity-10">
                        <svg class="h-8 w-8 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-800">{{ number_format($lowStockProducts) }}</h3>
                        <p class="text-rose-600 font-medium">Low Stock Alerts</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Recent Stock Movements -->
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Recent Stock Movements</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100 border-b-2 border-emerald-200">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Product</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Type</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Quantity</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentStocks as $stock)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-900">{{ $stock->product->name }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $stock->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($stock->type) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-900">{{ $stock->quantity }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-900">{{ $stock->created_at->format('M d, Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-sm text-gray-500 text-center">No recent stock movements</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Stock by Product -->
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Stock Distribution</h3>
                    <div class="space-y-4">
                        @foreach($stockByProduct as $product)
                        <div class="relative">
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-700">{{ $product->name }}</span>
                                <span class="text-sm font-medium text-gray-700">{{ number_format($product->quantity) }}</span>
                            </div>
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-emerald-100">
                                <div style="width: {{ ($product->quantity / $totalStock) * 100 }}%" 
                                     class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Stock Trends -->
            <div class="md:col-span-2 bg-white shadow-2xl rounded-2xl overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Stock Movement Trends</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-emerald-50 to-emerald-100 border-b-2 border-emerald-200">
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Date</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Stock In</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Stock Out</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-emerald-800">Net Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stockTrends as $trend)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-900">{{ \Carbon\Carbon::parse($trend->date)->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="text-green-600">+{{ number_format($trend->stock_in) }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="text-red-600">-{{ number_format($trend->stock_out) }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="{{ ($trend->stock_in - $trend->stock_out) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ ($trend->stock_in - $trend->stock_out) >= 0 ? '+' : '' }}{{ number_format($trend->stock_in - $trend->stock_out) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
