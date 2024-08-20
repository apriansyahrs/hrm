<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaveTypes = LeaveType::all();
        return response([
            'message' => 'Successfully retrieved leave types',
            'data' => $leaveTypes,
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
            'is_paid' => 'required',
            'total_leaves' => 'required',
            'max_leave_per_month' => 'nullable',
        ]);

        $leaveType = new LeaveType();
        $leaveType->company_id = 1;
        $leaveType->name = $request->name;
        $leaveType->is_paid = $request->is_paid;
        $leaveType->total_leaves = $request->total_leaves;
        $leaveType->max_leave_per_month = $request->max_leave_per_month;
        $leaveType->created_by = $request->user()->id;
        $leaveType->save();

        return response([
            'message' => 'Leave type created successfully',
            'data' => $leaveType,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leaveType = LeaveType::find($id);
        if (!$leaveType) {
            return response([
                'message' => 'Leave type not found',
            ], 404);
        }

        return response([
            'message' => 'Successfully retrieved leave type',
            'data' => $leaveType,
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
            'is_paid' => 'required',
            'total_leaves' => 'required',
            'max_leave_per_month' => 'nullable',
        ]);

        $leaveType = LeaveType::find($id);
        if (!$leaveType) {
            return response([
                'message' => 'Leave type not found',
            ], 404);
        }

        $leaveType->name = $request->name;
        $leaveType->is_paid = $request->is_paid;
        $leaveType->total_leaves = $request->total_leaves;
        $leaveType->max_leave_per_month = $request->max_leave_per_month;
        $leaveType->save();

        return response([
            'message' => 'Leave type updated successfully',
            'data' => $leaveType,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leaveType = LeaveType::find($id);
        if (!$leaveType) {
            return response([
                'message' => 'Leave type not found',
            ], 404);
        }

        $leaveType->delete();

        return response([
            'message' => 'Leave type deleted successfully',
        ], 200);
    }
}
