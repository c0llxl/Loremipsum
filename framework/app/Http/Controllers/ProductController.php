<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// Tambahkan untuk mengatur permission
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ProductController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-products')->only(['index', 'show']);
        $this->middleware('permission:create-products')->only(['create', 'store']);
        $this->middleware('permission:edit-products')->only(['edit', 'update']);
        $this->middleware('permission:delete-products')->only(['destroy']);
    }
    

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(10);
        return view('products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'type' => 'required|string|max:100',
            'quality' => 'required|string|max:50',
            'origin' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
    
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:products,name,'.$id,
            'type' => 'required|string|max:100',
            'quality' => 'required|string|max:50',
            'origin' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
        ]);
    
        if ($validator->passes())
        {
            // Update product data
            $product->update($request->all());
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        }
        else
        {
            return redirect()->route('products.edit', $id)->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $permission = Product::findOrFail($id);
            $permission->delete();
    
            return response()->json(['success' => true, 'message' => 'Permission deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete permission']);
        }
    }
}