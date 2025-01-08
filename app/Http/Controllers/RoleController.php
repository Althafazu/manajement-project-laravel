<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //menampilkan semua data
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }
    
    // create role 
    public function  store (Request $request)
    {
        $request()->validate([
            'deskripsi' => 'required|string|max:50',
            'status' => 'required|string|max:16'
        ]);

        $role = Role::create([
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
        ]);

        return response()->json($role, 201);
    }

    // show by role id
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    // update role
    public function update (Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required|string|max:50',
            'status' => 'required|string|max:16'
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
        ]);
        return response()->json($role);
    }

    // delete role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete($id);
        return response()->json(['message' => 'Role deleted']);
    }
}
