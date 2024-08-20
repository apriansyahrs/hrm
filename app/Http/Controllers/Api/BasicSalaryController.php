<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BasicSalary;
use Illuminate\Http\Request;

class BasicSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basicSalaries = BasicSalary::all();
        return response([
            'message' => 'Basic Salaries list',
            'data' => $basicSalaries
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
            'basic_salary' => 'required',
            'user_id' => 'required',
        ]);

        $user = $request->user();

        $basicSalary = new BasicSalary();
        $basicSalary->company_id = 1;
        $basicSalary->user_id = $request->user_id;
        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->save();

        return response([
            'message' => 'Basic Salary created',
            'data' => $basicSalary
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic Salary not found'
            ], 404);
        }

        return response([
            'message' => 'Basic Salary details',
            'data' => $basicSalary
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
            'basic_salary' => 'required',
            'user_id' => 'required',
        ]);

        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic Salary not found'
            ], 404);
        }

        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->user_id = $request->user_id;
        $basicSalary->save();

        return response([
            'message' => 'Basic Salary updated',
            'data' => $basicSalary
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic Salary not found'
            ], 404);
        }

        $basicSalary->delete();

        return response([
            'message' => 'Basic Salary deleted'
        ], 200);
    }
}
