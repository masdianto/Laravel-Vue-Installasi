<?php

namespace App\Services;

use App\Models\Attendance;
use Illuminate\Http\UploadedFile;

class AttendanceService
{
    public function createAttendance(array $data, UploadedFile $faceImage): Attendance
    {
        $path = $faceImage->store('face_images', 'public');

        return Attendance::create(array_merge($data, ['face_image_path' => $path]));
    }
}
