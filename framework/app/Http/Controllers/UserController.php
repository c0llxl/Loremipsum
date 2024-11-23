<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Validator;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:view-users')->only(['index', 'show']);
    //     $this->middleware('permission:create-users')->only(['create', 'store']);
    //     $this->middleware('permission:edit-users')->only(['edit', 'update']);
    //     $this->middleware('permission:delete-users')->only(['destroy']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.list', compact('users')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRole = $user->roles->pluck('id')->toArray();
        
        // Uncomment this line to debug
        // dd($user->roles, $hasRole);
        
        return view('users.edit', compact('user', 'roles', 'hasRole'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        \Log::info('Update User Request', [
            'user_id' => $id,
            'request_data' => $request->all()
        ]);
    
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,id'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)->withErrors($validator)->withInput();
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        // Get roles from request, defaulting to an empty array if not present
        $roleIds = $request->input('roles', []);
    
        \Log::info('Before syncRoles', [
            'user_id' => $user->id,
            'current_roles' => $user->roles->pluck('id')->toArray(),
            'roles_to_sync' => $roleIds
        ]);
    
        // Sync roles using IDs
        $roles = Role::whereIn('id', $roleIds)->get();
        $user->syncRoles($roles);
    
        // Refresh user model to get updated roles
        $user->refresh();
    
        \Log::info('After syncRoles', [
            'user_id' => $user->id,
            'new_roles' => $user->roles->pluck('id')->toArray()
        ]);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
    
            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete user']);
        }
    }
}