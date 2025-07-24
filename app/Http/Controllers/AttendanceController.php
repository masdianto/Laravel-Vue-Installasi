<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return Attendance::with('employee')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'check_in' => 'required',
            'status' => 'required',
        ]);

        return Attendance::create($request->all());
    }

    public function show(Attendance $attendance)
    {
        return $attendance->load('employee');
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'check_out' => 'required',
        ]);

        $attendance->update($request->all());

        return $attendance;
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return response()->json(null, 204);
    }
}
