<?php

namespace App\Enums;

enum SupportsStatusEnum: string
{
    case ACTIVE = 'active';
    case PENDING = 'pending';
    case CLOSED = 'closed';

    public static function getValues(): array
    {
        return [
            self::ACTIVE->value,
            self::PENDING->value,
            self::CLOSED->value,
        ];
    }
}
