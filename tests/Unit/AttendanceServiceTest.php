<?php

namespace Tests\Unit;

use App\Services\AttendanceService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Employee;

class AttendanceServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_attendance_record_and_store_the_face_image()
    {
        Storage::fake('public');

        $service = new AttendanceService();
        $image = UploadedFile::fake()->image('face.jpg');

        $employee = Employee::factory()->create();

        $attendance = $service->createAttendance([
            'employee_id' => $employee->id,
            'date' => '2023-07-24',
            'check_in' => '08:00:00',
            'status' => 'present',
            'latitude' => -6.20000000,
            'longitude' => 106.81666700,
        ], $image);

        $this->assertDatabaseHas('attendances', [
            'id' => $attendance->id,
        ]);

        Storage::disk('public')->assertExists($attendance->face_image_path);
    }
}
