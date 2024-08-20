<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leave = Leave::all();
        return response([
            'message' => 'Successfully retrieved leaves',
            'data' => $leave,
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
            'user_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_half_day' => 'required',
            'total_days' => 'required',
            'is_paid' => 'required',
            'reason' => 'required',

        ]);

        $leave = new Leave();
        $leave->user_id = $request->user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->is_half_day = $request->is_half_day;
        $leave->total_days = $request->total_days;
        $leave->is_paid = $request->is_paid;
        $leave->reason = $request->reason;
        $leave->status = 'pending';
        $leave->save();

        return response([
            'message' => 'Leave created successfully',
            'data' => $leave,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found',
            ], 404);
        }

        return response([
            'message' => 'Successfully retrieved leave',
            'data' => $leave,
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
            'user_id' => 'required',
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_half_day' => 'required',
            'total_days' => 'required',
            'is_paid' => 'required',
            'reason' => 'required',
            'status' => 'required',
        ]);

        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found',
            ], 404);
        }

        $leave->user_id = $request->user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->is_half_day = $request->is_half_day;
        $leave->total_days = $request->total_days;
        $leave->is_paid = $request->is_paid;
        $leave->reason = $request->reason;
        $leave->status = $request->status;
        $leave->save();

        return response([
            'message' => 'Leave updated successfully',
            'data' => $leave,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $leave = Leave::find($id);
        if (!$leave) {
            return response([
                'message' => 'Leave not found',
            ], 404);
        }

        $leave->delete();

        return response([
            'message' => 'Leave deleted successfully',
        ], 200);
    }
}
