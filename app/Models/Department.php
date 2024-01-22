<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory, SoftDeletes;

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

    public static function getForm(): array
    {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')->required(),

                    Forms\Components\TextInput::make('note'),

                    Forms\Components\Select::make('department_id')
                        ->options(Department::all()->pluck('title', 'id'))
                        ->label('Parent Department'),

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
