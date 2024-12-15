<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total stock value
        $totalStock = Stock::sum('quantity');
        
        // Total products
        $totalProducts = Product::count();
        
        // Low stock products (less than 10 items)
        $lowStockProducts = Product::where('quantity', '<', 10)->count();
        
        // Recent stock movements
        $recentStocks = Stock::with('product')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Stock distribution by product
        $stockByProduct = Product::select('name', 'quantity')
            ->orderBy('quantity', 'desc')
            ->take(5)
            ->get();
            
        // Stock movement trends (in/out) - Fixed GROUP BY issue
        $stockTrends = Stock::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(CASE WHEN type = "in" THEN quantity ELSE 0 END) as stock_in'),
            DB::raw('SUM(CASE WHEN type = "out" THEN quantity ELSE 0 END) as stock_out')
        )
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy(DB::raw('DATE(created_at)'), 'desc')
        ->take(7)
        ->get();

        return view('dashboard.dashboard', compact(
            'totalStock',
            'totalProducts',
            'lowStockProducts',
            'recentStocks',
            'stockByProduct',
            'stockTrends'
        ));
    }
}
