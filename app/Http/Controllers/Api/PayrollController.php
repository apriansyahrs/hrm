<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payroll = Payroll::all();
        return response([
            'message' => 'Successfully retrieved payroll',
            'data' => $payroll,
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
            'salary' => 'required',
            'month' => 'required',
            'year' => 'required',
            'status' => 'required',
        ]);

        $payroll = new Payroll();
        $payroll->company_id = 1;
        $payroll->user_id = $request->user_id;
        $payroll->salary = $request->salary;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->status = $request->status;
        $payroll->save();
        return response([
            'message' => 'Payroll created successfully',
            'data' => $payroll,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payroll = Payroll::find($id);
        if (!$payroll) {
            return response([
                'message' => 'Payroll not found',
            ], 404);
        }

        return response([
            'message' => 'Successfully retrieved payroll',
            'data' => $payroll,
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
        $payroll = Payroll::find($id);
        if (!$payroll) {
            return response([
                'message' => 'Payroll not found',
            ], 404);
        }

        $request->validate([
            'user_id' => 'required',
            'salary' => 'required',
            'month' => 'required',
            'year' => 'required',
            'status' => 'required',
        ]);

        $payroll->user_id = $request->user_id;
        $payroll->salary = $request->salary;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->status = $request->status;
        $payroll->save();
        return response([
            'message' => 'Payroll updated successfully',
            'data' => $payroll,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payroll = Payroll::find($id);
        if (!$payroll) {
            return response([
                'message' => 'Payroll not found',
            ], 404);
        }

        $payroll->delete();
        return response([
            'message' => 'Payroll deleted successfully',
        ], 200);
    }
}
