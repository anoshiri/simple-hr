<?php

namespace App\Models;

use App\Enums\ProficiencyEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LanguageSpoken extends Model
{
    use HasFactory;


    protected $fillable = [
        'employee_id', 'language_name', 'proficiency_level'
    ];


    protected $casts = [
        'proficiency_level' => ProficiencyEnum::class
    ];


    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
