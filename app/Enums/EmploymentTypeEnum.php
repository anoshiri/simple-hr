<?php
namespace App\Enums;

enum EmploymentTypeEnum : string {
    case FULL_TIME = 'Full-time';
    case PART_TIME = 'Part-time';
    case CONTRACT = 'Contract';


    public static function values(): array
    {
       return array_column(self::cases(), 'value');
    }
}
