<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Validator;
use Spatie\Permission\Traits\HasRoles;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-permissions')->only(['index']);
        $this->middleware('permission:create-permissions')->only(['create', 'store']);
        $this->middleware('permission:edit-permissions')->only(['edit', 'update']);
        $this->middleware('permission:delete-permissions')->only(['destroy']);
    }
    // Method ini akan menampilkan halaman permission
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(10);
        return view('permissions.list', compact('permissions'));

    }

    // Method ini akan membuat Permission   
    public function create()
    {
        return view('permissions.create');
    }

    // Method ini akan menampilkan form edit Permission
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }

    // Method ini akan menyimpan Permission baru
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:1'
        ]);

        if ($validator->passes())
        {
            // Simpan Permission baru ke database
            Permission::create(['name'=> $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
        
        }
        else
        {
            return redirect()->route('permissions.create')->withErrors($validator)->withInput();
        }
    }

    // Method ini akan mengupdate Permission yang sudah ada
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
         // Validasi data
         $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name,'.$id.',id'
        ]);

        if ($validator->passes())
        {
            // Simpan Permission baru ke database
            $permission->name = $request->name;
            $permission->save();
            return redirect()->route('permissions.index')->with('success', 'Permission update successfully.');
        
        }
        else
        {
            return redirect()->route('permissions.edit', $id)->withErrors($validator)->withInput();
        }
    }

    // Method ini akan menghapus Permission dari Database
    public function destroy($id)
    {
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
    
            return response()->json(['success' => true, 'message' => 'Permission deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete permission']);
        }
    }
}