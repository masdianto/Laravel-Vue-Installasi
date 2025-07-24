<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function index()
    {
        return Attendance::with('employee')->get();
    }

    public function store(StoreAttendanceRequest $request)
    {
        return $this->attendanceService->createAttendance(
            $request->validated(),
            $request->file('face_image')
        );
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
