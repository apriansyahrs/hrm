<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        return response([
            'message' => 'Shifts list',
            'data' => $shifts
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
            'clock_in_time' => 'required',
            'clock_out_time' => 'required',
        ]);

        $user = $request->user();

        $shift = new Shift();
        $shift->company_id = 1;
        $shift->created_by = $user->id;
        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;
        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        return response([
            'message' => 'Shift created',
            'data' => $shift
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        return response([
            'message' => 'Shift details',
            'data' => $shift
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
            'clock_in_time' => 'required',
            'clock_out_time' => 'required',
        ]);

        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        $shift->name = $request->name;
        $shift->clock_in_time = $request->clock_in_time;
        $shift->clock_out_time = $request->clock_out_time;
        $shift->late_mark_after = $request->late_mark_after;
        $shift->early_clock_in_time = $request->early_clock_in_time;
        $shift->allow_clock_out_till = $request->allow_clock_out_till;
        $shift->save();

        return response([
            'message' => 'Shift updated',
            'data' => $shift
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shift = Shift::find($id);
        if (!$shift) {
            return response([
                'message' => 'Shift not found'
            ], 404);
        }

        $shift->delete();
        return response([
            'message' => 'Shift deleted'
        ], 200);
    }
}
