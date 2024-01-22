<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Forms;

class Announcement extends Model
{
    use HasFactory;

    public function sender() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }


    // get Filament Form
    public static function getForm() {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('to')->required(),

                    Forms\Components\TextInput::make('subject')->required(),

                    Forms\Components\TextInput::make('message')->required()
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
