<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-reports')->only(['index']);
        $this->middleware('permission:generate-reports')->only(['generatePdf']);
    }

    /**
     * Display the report index page.
     */
    public function index()
    {
        // Ambil semua data produk dan stok
        $products = Product::with('stocks')->get(); // Dengan relasi ke stok
        $stocks = Stock::with('product')->get();   // Dengan relasi ke produk

        return view('reports.index', compact('products', 'stocks'));
    }

    /**
     * Generate PDF report.
     */
    public function generatePdf()
    {
        $products = Product::all();
        $stocks = Stock::with('product')->get();
    
        $pdf = Pdf::loadView('reports.pdf', compact('products', 'stocks'));
    
        return $pdf->download('report.pdf');
    }
}

