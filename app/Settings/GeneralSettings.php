<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?string $name;
    public ?string $slogan;
    public ?string $address;
    public ?string $city;
    public ?string $state;
    public ?string $postalCode;
    public ?string $country;
    public ?string $email;
    public ?string $phone;
    public ?string $logo;
    public ?string $favicon;
    public ?string $currency;

    public static function group(): string
    {
        return 'general';
    }
}
