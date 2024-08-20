<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return response([
            'message' => 'Departments list',
            'data' => $departments
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
        //validate request
        $request->validate([
            'name' => 'required',
        ]);

        $user = $request->user();

        $department = new Department();
        $department->company_id = 1;
        $department->created_by = $user->id;
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return response([
            'message' => 'Department created',
            'data' => $department
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found'
            ], 404);
        }

        return response([
            'message' => 'Department details',
            'data' => $department
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
        //validate request
        $request->validate([
            'name' => 'required',
        ]);

        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found'
            ], 404);
        }

        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return response([
            'message' => 'Department updated',
            'data' => $department
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found'
            ], 404);
        }

        $department->delete();

        return response([
            'message' => 'Department deleted'
        ], 200);
    }
}
