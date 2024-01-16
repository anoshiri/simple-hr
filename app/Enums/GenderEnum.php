<?php
namespace App\Enums;

enum GenderEnum : string {
    case MALE = 'Male';
    case FEMALE = 'Female';


    public static function values(): array
    {
       return array_column(self::cases(), 'value');
    }

    public static function valuePairs() : array
    {
        $values = self::values();
        return array_combine($values, $values);
    }


    public function shortForm() : string{
        return match($this) {
            GenderEnum::MALE => 'M',
            GenderEnum::FEMALE => 'F',
        };
    }
}
