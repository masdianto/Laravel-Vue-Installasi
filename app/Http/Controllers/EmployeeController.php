<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'position' => 'required',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        return Employee::create($request->all());
    }

    public function show(Employee $employee)
    {
        return $employee;
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        $employee->update($request->all());

        return $employee;
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(null, 204);
    }
}
