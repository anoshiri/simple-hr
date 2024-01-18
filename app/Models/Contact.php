<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;


    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the employee full name.
     */
    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['address'].'<br /> '.$attributes['city'].' '.$attributes['state'].' '.$attributes['postal_code'].'<br /> '.$attributes['country'],
        );
    }

    /**
     * Get the employee full name.
     */
    protected function phoneNumbers(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 'W: '.$attributes['work_phone'].'<br />M: '.$attributes['mobile_phone'],
        );
    }

    /**
     * Get the employee full name.
     */
    protected function emailAddresses(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 'W: '.$attributes['work_email'].'<br />P: '.$attributes['personal_email'],
        );
    }



    public static function getForm(): array
    {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\Select::make('employee_id')
                        ->relationship('employee', 'first_name')
                        ->required(),

                    Forms\Components\TextInput::make('address')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('city')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('state')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('country')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('postal_code')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('work_phone')
                        ->tel()
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('mobile_phone')
                        ->tel()
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('work_email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('personal_email')
                        ->email()
                        ->required()
                        ->maxLength(255),
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
