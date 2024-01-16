<?php

namespace App\Models;

use App\Enums\EmploymentTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmploymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'job_title', 'department', 'hire_date',
        'employment_type', 'employment_status', 'end_date', 'work_location',
    ];


    protected $casts = [
        'employment_type' => EmploymentTypeEnum::class
    ];


    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
