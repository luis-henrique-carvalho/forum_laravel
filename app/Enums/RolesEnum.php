<?php

namespace App\Enums;

enum RolesEnum: string
{
    case USER = 'user';
    case ADMIN = 'admin';

    public function is(string $role): bool
    {
        return $this->value === $role;
    }
}
