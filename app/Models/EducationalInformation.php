<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationalInformation extends Model
{
    use HasFactory;

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
                        ->relationship('employee', 'first_name')
                        ->required(),

                    Forms\Components\TextInput::make('degree')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('major')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('institution')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\DatePicker::make('admission_date')
                        ->required(),

                    Forms\Components\DatePicker::make('graduation_date'),
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
