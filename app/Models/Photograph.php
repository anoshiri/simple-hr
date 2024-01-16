<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photograph extends Model
{
    use HasFactory;


    protected $fillable = [
        'employee_id', 'title', 'path'
    ];


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => storage_path('app/'. config('main.paths.photographs'). '/'. $attributes['path']),
        );
    }


    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}