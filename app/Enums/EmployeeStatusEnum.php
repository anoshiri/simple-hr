<?php
namespace App\Enums;

enum EmployeeStatusEnum : int {
    case ACTIVE = 1;
    case INACTIVE = 0;
    case FIRED = 8;
    case RESIGNED = 7;


    public static function values(): array
    {
       return array_column(self::cases(), 'value');
    }

    public static function valuePairs() : array
    {
        $values = self::values();
        return array_combine($values, $values);
    }


    public function label() : string{
        return match($this) {
            EmployeeStatusEnum::ACTIVE => 'Active',
            EmployeeStatusEnum::INACTIVE => 'Inactive',
            EmployeeStatusEnum::FIRED => 'Fired',
            EmployeeStatusEnum::RESIGNED => 'Resigned',
        };
    }
}
