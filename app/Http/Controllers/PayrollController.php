<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayrollRequest;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        return Payroll::with('employee')->get();
    }

    public function store(StorePayrollRequest $request)
    {
        return Payroll::create($request->validated());
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
