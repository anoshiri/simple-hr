<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'date_of_birth', 'designation'
    ];

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
    public function status() : BelongsTo
    {
        return $this->belongsTo(EmployeeStatus::class);
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



    public function designations() : HasMany
    {
        return $this->hasMany(Designation::class);
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



    public function personalInformation()
    {
        return $this->hasMany(PersonalInformation::class);
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




    public function photographs()
    {
        return $this->hasMany(Photograph::class);
    }
}