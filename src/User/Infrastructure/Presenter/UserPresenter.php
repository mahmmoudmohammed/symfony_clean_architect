<?php

namespace App\User\Infrastructure\Presenter;

use App\Core\Infrastructure\Presenter\BasePresenter;

class UserPresenter extends BasePresenter
{
    private ?int $id;
    private ?string $email;
    private ?string $name;
    private ?string $username;
    private ?string $profileImage;
    private ?string $phone;
    private ?string $countryCode;
    private ?int $gender;
    private ?\DateTimeImmutable $createdAt;
    private ?\DateTimeImmutable $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): UserPresenter
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): UserPresenter
    {
        $this->email = $email;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): UserPresenter
    {
        $this->name = $name;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): UserPresenter
    {
        $this->username = $username;
        return $this;
    }

    public function getProfileImage(): ?string
    {
        return $this->profileImage;
    }

    public function setProfileImage(?string $profileImage): UserPresenter
    {
        $this->profileImage = $profileImage;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): UserPresenter
    {
        $this->phone = $phone;
        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): UserPresenter
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(?int $gender): UserPresenter
    {
        $this->gender = $gender;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): UserPresenter
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): UserPresenter
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
