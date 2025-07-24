<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return Leave::with('employee')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
            'status' => 'required',
        ]);

        return Leave::create($request->all());
    }

    public function show(Leave $leave)
    {
        return $leave->load('employee');
    }

    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $leave->update($request->all());

        return $leave;
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();

        return response()->json(null, 204);
    }
}
