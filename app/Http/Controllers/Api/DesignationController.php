<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::all();
        return response([
            'message' => 'Designations list',
            'data' => $designations
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

        $designation = new Designation();
        $designation->company_id = 1;
        $designation->created_by = $user->id;
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        return response([
            'message' => 'Designation created',
            'data' => $designation
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $designation = Designation::find($id);
        if (!$designation) {
            return response([
                'message' => 'Designation not found'
            ], 404);
        }

        return response([
            'message' => 'Designation details',
            'data' => $designation
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

        $user = $request->user();

        $designation = Designation::find($id);
        if (!$designation) {
            return response([
                'message' => 'Designation not found'
            ], 404);
        }

        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->save();

        return response([
            'message' => 'Designation updated',
            'data' => $designation
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $designation = Designation::find($id);
        if (!$designation) {
            return response([
                'message' => 'Designation not found'
            ], 404);
        }

        $designation->delete();

        return response([
            'message' => 'Designation deleted'
        ], 200);
    }
}
