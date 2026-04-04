<?php

namespace App\Enums;

enum UserRole: string
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case Coach = 'coach';
    case Student = 'student';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
