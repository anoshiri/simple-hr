<?php

namespace App\Enums;

enum ProficiencyEnum: int
{
    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
    case FOUR = 4;
    case FIVE = 5;

    public static function labels(): array
    {
        
       return array_column(self::cases(), 'value');
    }

    public static function keys(): array
    {
        return array_column(self::cases(), 'name');
    }



    public static function valuePairs() : array
    {
        return array_combine(self::keys(), self::labels());
    }



    public function label(): string
    {
        return match($this) {
            ProficiencyEnum::ONE => 'Beginner',
            ProficiencyEnum::TWO => 'Intermediate',
            ProficiencyEnum::THREE => 'Proficient',
            ProficiencyEnum::FOUR => 'Fluent',
            ProficiencyEnum::FIVE => 'Native Speaker'
        };
    }
}

