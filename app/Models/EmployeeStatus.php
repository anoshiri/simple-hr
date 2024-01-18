<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'description'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'status');
    }
}
