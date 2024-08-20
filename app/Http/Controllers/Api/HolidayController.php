<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidays = Holiday::all();
        return response([
            'message' => 'Holidays list',
            'data' => $holidays
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
            'month' => 'required',
            'year' => 'required',
            'date' => 'required',
            'is_weekend' => 'required',
        ]);

        $holiday = new Holiday();
        $holiday->company_id = 1;
        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->save();

        return response([
            'message' => 'Holiday created',
            'data' => $holiday
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found'
            ], 404);
        }

        return response([
            'message' => 'Holiday details',
            'data' => $holiday
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
            'month' => 'required',
            'year' => 'required',
            'date' => 'required',
            'is_weekend' => 'required',
        ]);

        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found'
            ], 404);
        }

        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->save();

        return response([
            'message' => 'Holiday updated',
            'data' => $holiday
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found'
            ], 404);
        }

        $holiday->delete();

        return response([
            'message' => 'Holiday deleted'
        ], 200);
    }
}
