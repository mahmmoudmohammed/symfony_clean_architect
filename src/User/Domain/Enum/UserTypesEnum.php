<?php

namespace App\User\Domain\Enum;

enum UserTypesEnum: int
{
    case PERSONAL = 1;
    case ADMIN = 2;
    case COMMERCIAL = 4;
}
