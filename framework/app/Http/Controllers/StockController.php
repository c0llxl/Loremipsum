<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-stocks')->only(['index', 'show']);
        $this->middleware('permission:create-stocks')->only(['create', 'store']);
        $this->middleware('permission:edit-stocks')->only(['edit', 'update']);
        $this->middleware('permission:delete-stocks')->only(['destroy']);
    }

    public function index()
    {
        $stocks = Stock::with(['product', 'user'])
                      ->orderBy('date', 'desc')
                      ->latest()
                      ->paginate(10);
        return view('stock.list', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'source' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'date' => 'required|date',
            'note' => 'nullable|string'
        ]);

        // Add user_id to request data
        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Create stock record without modifying product quantity
        Stock::create($data);

        return redirect()->route('stock.index')->with('success', 'Stock transaction recorded successfully.');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $products = Product::all();
        return view('stock.edit', compact('stock', 'products'));
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'source' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'date' => 'required|date',
            'note' => 'nullable|string'
        ]);

        if ($validator->passes()) {
            // Update stock record without modifying product quantity
            $stock->update($request->all());

            return redirect()->route('stock.index')->with('success', 'Stock updated successfully.');
        } else {
            return redirect()->route('stock.edit', $id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $stock = Stock::findOrFail($id);

            // Delete stock record without reverting product quantity
            $stock->delete();

            return response()->json(['success' => true, 'message' => 'Stock record deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete stock record']);
        }
    }
}
