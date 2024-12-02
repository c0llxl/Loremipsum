<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-roles')->only(['index']);
        $this->middleware('permission:create-roles')->only(['create', 'store']);
        $this->middleware('permission:edit-roles')->only(['edit', 'update']);
        $this->middleware('permission:delete-roles')->only(['destroy']);
    }

    // list 
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->paginate(10);
        return view('roles.list', compact('roles'));
    }

    // create
    public function create()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();

        return view('roles.create', compact('permissions'));
    }

    // store
    public function store(Request $request)
    {
        // validate and store the role
        $validator = Validator::make($request->all(), [
            'name' =>'required|unique:roles|min:1',
        ]);

        if ($validator->passes()) {
            // dd( $request->permission);
            $role = Role::create(['name' => $request->name]);

            if (!empty($request->permission))
            {
                foreach ($request->permission as $name) 
                {
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('roles.index')->with('success', 'Permisssion added successfully');
        }
        else
        {
            return redirect()->route('roles.create')->withErrors($validator)->withInput();

        }



    }

    // edit
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermission = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions,
            'hasPermissions' => $hasPermission,
        ]);

    }

    // update
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        // Validasi data
        $validator = Validator::make($request->all(),[  
           'name' => 'required|unique:roles,name,'.$id.',id'
       ]);

       if ($validator->passes())
       {
           // Simpan Permission baru ke database
           $role->name = $request->name;
           $role->save();

           if (!empty($request->permission)) 
           {
            $role->syncPermissions($request->permission);
           }
           else
           {
            $role->syncPermissions([]);
           }

           return redirect()->route('roles.index')->with('success', 'Role update successfully.');
       
       }
       else
       {
           return redirect()->route('roles.edit', $id)->withErrors($validator)->withInput();
       }
    }

    // delete
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
    
            return response()->json(['success' => true, 'message' => 'Permission deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete permission']);
        }
    }
}