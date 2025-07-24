<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage_shifts');
    }

    public function index()
    {
        return Shift::with('employees')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:shifts',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        return Shift::create($request->all());
    }

    public function show(Shift $shift)
    {
        return $shift->load('employees');
    }

    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'name' => 'required|unique:shifts,name,' . $shift->id,
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $shift->update($request->all());

        return $shift;
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();

        return response()->json(null, 204);
    }

    public function assignEmployee(Request $request, Shift $shift)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $shift->employees()->attach($request->employee_id);

        return response()->json(null, 204);
    }

    public function revokeEmployee(Request $request, Shift $shift)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $shift->employees()->detach($request->employee_id);

        return response()->json(null, 204);
    }
}
