<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'type',
        'description',
        'effective_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
