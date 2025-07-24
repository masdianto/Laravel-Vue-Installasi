<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_employee()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        $response = $this->postJson('/api/employees', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'position' => 'Software Engineer',
            'salary' => 80000,
            'hire_date' => '2023-01-15',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'John Doe']);

        $this->assertDatabaseHas('employees', [
            'email' => 'john.doe@example.com',
        ]);
    }
}
