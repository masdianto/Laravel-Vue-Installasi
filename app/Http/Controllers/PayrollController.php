<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        return Payroll::with('employee')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'pay_date' => 'required|date',
            'gross_salary' => 'required|numeric',
            'net_salary' => 'required|numeric',
            'status' => 'required',
        ]);

        return Payroll::create($request->all());
    }

    public function show(Payroll $payroll)
    {
        return $payroll->load('employee');
    }

    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $payroll->update($request->all());

        return $payroll;
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();

        return response()->json(null, 204);
    }
}
