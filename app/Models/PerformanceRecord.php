<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerformanceRecord extends Model
{
    use HasFactory;


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

            Forms\Components\DatePicker::make('appraisal_date')
                ->required(),

            Forms\Components\TextInput::make('reviewer')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('performance_metrics')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('performance_score')
                ->required()
                ->numeric(),

            Forms\Components\Textarea::make('feedback')
                ->required()
                ->maxLength(65535)
                ->columnSpanFull(),
        ];
    }
}
