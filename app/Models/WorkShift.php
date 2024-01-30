<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkShift extends Model
{
    use HasFactory;

    protected $casts = [
        'days' => 'array'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
