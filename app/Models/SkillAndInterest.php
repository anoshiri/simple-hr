<?php

namespace App\Models;

use Filament\Forms;
use App\Enums\ProficiencyEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Cast\Array_;

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


    public static function getForm(): Array
    {
        return [
            Forms\Components\Select::make('employee_id')
                ->relationship(
                    'employee',
                    "full_name"
                )
                ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->first_name} {$record->last_name}")
                ->searchable(['first_name', 'last_name'])
                ->preload()
                ->createOptionForm(Employee::getForm())
                ->editOptionForm(Employee::getForm())
                ->required(),

            Forms\Components\TextInput::make('skill_name')
                ->required(),

            Forms\Components\Select::make('proficiency_level')
                ->options(ProficiencyEnum::class)
                ->enum(ProficiencyEnum::class)
                ->required(),
        ];
    }
}
