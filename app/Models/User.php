<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Filament\Forms;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use App\Enums\GenderEnum;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable, HasRoles, HasSuperAdmin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function canAccessPanel(Panel $panel): bool
    {
        if (!$panel->getId()) {
            return false;
        }

        return true;
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('Super Admin');
    }


    public static function getForm(): array
    {
        return [
            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('first_name')->required(),

                    Forms\Components\TextInput::make('last_name')->required(),

                    Forms\Components\Select::make('gender')
                        ->enum(GenderEnum::class)
                        ->options(GenderEnum::class)
                        ->required(),

                    Forms\Components\DatePicker::make('date_of_birth')->required(),

                    Forms\Components\TextInput::make('designation')
                        ->label('Designation/Job Position')
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
                            $data = User::factory()->make()->toArray();
                            $livewire->form->fill($data);
                        }),
                ])
        ];
    }
}
