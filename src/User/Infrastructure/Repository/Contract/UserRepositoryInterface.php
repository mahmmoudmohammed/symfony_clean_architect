<?php

namespace App\User\Infrastructure\Repository\Contract;

use App\User\DTO\UserSearchDto;

interface UserRepositoryInterface
{
    public function search(UserSearchDto $dto): array;
}