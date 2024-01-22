<?php

namespace App\Models;

use Filament\Forms;
use App\Enums\ProficiencyEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LanguageSpoken extends Model
{
    use HasFactory;


    protected $casts = [
        'proficiency_level' => ProficiencyEnum::class
    ];


    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }


    public static function getForm(): array
    {
        return [
            Forms\Components\Section::make()
                ->schema([
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

                    Forms\Components\TextInput::make('language_name')
                        ->required(),

                    Forms\Components\Select::make('proficiency_level')
                        ->options(ProficiencyEnum::class)
                        ->enum(ProficiencyEnum::class)
                        ->required(),
                ]),
                // fill form with factory data during testing
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('Fill with factory data')
                        ->icon('heroicon-m-star')
                        ->visible(function($operation) {
                            if ($operation == 'create' && app()->environment() == 'local' ) {
                                return true;
                            }

                            return false;
                        })
                        ->action(function ($livewire) {
                            $data = self::factory()->make()->toArray();
                            $livewire->form->fill($data);
                        }),
                ])
        ];
    }
}
