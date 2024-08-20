<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response([
            'message' => 'Roles list',
            'data' => $roles
        ], 200);
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
        $request->validate([
            'name' => 'required',
        ]);

        $role = new Role();
        $role->company_id = 1;
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        return response([
            'message' => 'Role created',
            'data' => $role
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response([
                'message' => 'Role not found'
            ], 404);
        }

        return response([
            'message' => 'Role details',
            'data' => $role
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'permissionIds' => 'required|array',
        ]);

        $role = Role::find($id);
        if (!$role) {
            return response([
                'message' => 'Role not found'
            ], 404);
        }

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->sync($request->permissionIds);


        return response([
            'message' => 'Role updated',
            'data' => $role
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
