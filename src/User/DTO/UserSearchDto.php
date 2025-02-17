<?php

namespace App\User\DTO;

use App\Core\DTO\Contract\SearchableDtoInterface;

class UserSearchDto implements SearchableDtoInterface
{
    private ?string $name;
    private ?string $email;
    private ?string $username;
    private ?int $type;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): UserSearchDto
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): UserSearchDto
    {
        $this->email = $email;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): UserSearchDto
    {
        $this->username = $username;
        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): UserSearchDto
    {
        $this->type = $type;
        return $this;
    }

    public static function getSearchableFields(): array
    {
        return ['name', 'email', 'username', 'type'];
    }
}