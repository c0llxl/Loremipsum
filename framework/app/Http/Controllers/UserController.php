<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-users')->only(['index', 'show']);
        $this->middleware('permission:create-users')->only(['create', 'store']);
        $this->middleware('permission:edit-users')->only(['edit', 'update']);
        $this->middleware('permission:delete-users')->only(['destroy']);
    }

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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,id'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validasi gambar
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('users.create')->withErrors($validator)->withInput();
        }
    
        $data = $request->only(['name', 'email']);
        $data['password'] = bcrypt($request->password);
    
        if ($request->hasFile('img')) {
            $fileName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $fileName);
            $data['img'] = $fileName;
        }
    
        $user = User::create($data);
    
        // Tambahkan roles
        $roles = Role::whereIn('id', $request->input('roles', []))->get();
        $user->assignRole($roles);
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
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
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['exists:roles,id'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validasi untuk gambar
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)->withErrors($validator)->withInput();
        }
    
        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($user->img && \Storage::exists('public/images/' . $user->img)) {
                \Storage::delete('public/images/' . $user->img);
            }
    
            // Simpan gambar baru
            $fileName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $fileName);
            $user->img = $fileName;
        }
    
        $user->save();
    
        // Sinkronisasi roles
        $roleIds = $request->input('roles', []);
        $roles = Role::whereIn('id', $roleIds)->get();
        $user->syncRoles($roles);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
      /**
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