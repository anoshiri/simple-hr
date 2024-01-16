<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'note', 'department_id'
    ];


    public function parent(): ?BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }


    public function parentComposedTitle() : Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['department_id'] ?  $this->parent->parentComposedTitle. ' -> ' . $this->parent->title : ''
        );
    }
}
