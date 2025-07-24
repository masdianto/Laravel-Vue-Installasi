<?php

namespace App\Http\Controllers;

use App\Models\EmployeeMovement;
use Illuminate\Http\Request;

class EmployeeMovementController extends Controller
{
    public function index()
    {
        return EmployeeMovement::with('employee')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type' => 'required',
            'effective_date' => 'required|date',
        ]);

        return EmployeeMovement::create($request->all());
    }

    public function show(EmployeeMovement $employeeMovement)
    {
        return $employeeMovement->load('employee');
    }

    public function destroy(EmployeeMovement $employeeMovement)
    {
        $employeeMovement->delete();

        return response()->json(null, 204);
    }
}
