<?php

namespace App\Models;

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
}
