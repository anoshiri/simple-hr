<?php

namespace App\Models;

use Filament\Forms;
use App\Enums\EmploymentTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmploymentHistory extends Model
{
    use HasFactory;


    protected $casts = [
        'employment_type' => EmploymentTypeEnum::class
    ];


    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public static function getForm(): array
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

            Forms\Components\Select::make('employment_type')
                ->required()
                ->enum(EmploymentTypeEnum::class)
                ->options(EmploymentTypeEnum::class),

            Forms\Components\TextInput::make('job_title')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('work_location')
                ->required()
                ->maxLength(255),

            Forms\Components\DatePicker::make('hire_date')
                ->required(),

            Forms\Components\DatePicker::make('end_date')
                ->required(),
        ];
    }
}
