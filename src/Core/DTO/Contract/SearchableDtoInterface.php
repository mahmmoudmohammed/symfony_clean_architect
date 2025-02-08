<?php

namespace App\Core\DTO\Contract;

interface SearchableDtoInterface
{
    public static function getSearchableFields(): array;

}