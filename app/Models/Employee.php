<?php

namespace App\Models;

use Filament\Forms;
use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'date_of_birth' => 'date'
    ];

    /**
     * Get the employee full name.
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['first_name'].' '.$attributes['last_name'],
        );
    }


    /**
     * Get the employee birthday.
     */
    protected function birthday(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->date_of_birth->isoFormat('MMM Do'),
        );
    }


    /**
     * RELATIONSHIPS
     */

    public function user(): HasOne
    {
        if ($this->has(User::class)) {
            return $this->hasOne(User::class, 'employee_id');
        }

        return '';
    }


    public function employeeStatus() : BelongsTo
    {
        return $this->belongsTo(EmployeeStatus::class, 'status', 'id');
    }


    public function jobCategory() : BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }


    public function announcements() : HasMany
    {
        return $this->hasMany(Announcement::class);
    }


    public function contacts() : HasMany
    {
        return $this->hasMany(Contact::class);
    }



    public function awards() : HasMany
    {
        return $this->hasMany(Award::class);
    }



    public function positionsHeld() : HasMany
    {
        return $this->hasMany(PositionHeld::class);
    }



    public function employmentHistories() : HasMany
    {
        return $this->hasMany(EmploymentHistory::class);
    }



    public function bankingInformation()
    {
        return $this->hasMany(BankingInformation::class);
    }



    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContact::class);
    }



    public function identificationDocuments()
    {
        return $this->hasMany(IdentificationDocument::class);
    }



    public function certificateLicenses()
    {
        return $this->hasMany(CertificateLicense::class);
    }



    public function educationalInformation()
    {
        return $this->hasMany(EducationalInformation::class);
    }



    public function trainings()
    {
        return $this->hasMany(Training::class);
    }



    public function performanceRecords()
    {
        return $this->hasMany(PerformanceRecord::class);
    }



    public function languageSpokens()
    {
        return $this->hasMany(LanguageSpoken::class);
    }




    public function skillAndInterests()
    {
        return $this->hasMany(SkillAndInterest::class);
    }




    public function photographs(): HasMany
    {
        return $this->hasMany(Photograph::class);
    }



    public function employmentStatus(): BelongsTo
    {
        return $this->belongsTo(EmploymentStatus::class);
    }



    public function payGrade(): BelongsTo
    {
        return $this->belongsTo(PayGrade::class);
    }


    public static function getForm(): array
    {
        return [
            Forms\Components\Section::make()
                ->columns(3)
                ->schema([
                    Forms\Components\FileUpload::make('photo')
                        ->avatar()
                        ->nullable(),


                    Forms\Components\TextInput::make('first_name')->required(),

                    Forms\Components\TextInput::make('middle_name'),

                    Forms\Components\TextInput::make('last_name')->required(),

                    Forms\Components\TextInput::make('employee_code'),

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
                            $data = Employee::factory()->make()->toArray();
                            $livewire->form->fill($data);
                        }),
                ])
        ];
    }
}
