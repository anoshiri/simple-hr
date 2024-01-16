<?php
namespace App\Enums;

enum MaritalStatusEnum: string
{
    case MARRIED = 'Married';
    case SINGLE = 'Single';
    case DIVORCED = 'Divorced';
    case WIDOWED = 'Widowed';

    public static function values(): array
    {
       return array_column(self::cases(), 'value');
    }


    public function SingleWord(): string
    {
        return match($this) {
            MaritalStatusEnum::MARRIED => 'm',
            MaritalStatusEnum::SINGLE => 's',
            MaritalStatusEnum::DIVORCED => 'd',
            MaritalStatusEnum::WIDOWED => 'w',
        };
    }
}

