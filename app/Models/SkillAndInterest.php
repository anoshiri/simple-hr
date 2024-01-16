<?php

namespace App\Models;

use App\Enums\ProficiencyEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillAndInterest extends Model
{
    use HasFactory;

    protected $casts = [
        'proficiency' => ProficiencyEnum::class
    ];



    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
