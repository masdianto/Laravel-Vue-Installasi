<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveRequest;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return Leave::with('employee')->get();
    }

    public function store(StoreLeaveRequest $request)
    {
        return Leave::create($request->validated());
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
