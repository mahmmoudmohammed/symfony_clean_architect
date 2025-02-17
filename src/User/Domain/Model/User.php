<?php

namespace App\User\Domain\Model;


class User
{
    private ?int $id = null;

    private ?int $type = null;

    private ?string $email = null;

    private ?string $name = null;

    private ?string $username = null;

    private ?string $password = null;

    private ?int $passwordStatus = null;

    private ?int $passwordLastChanged = null;

    private ?\DateTimeImmutable $createdAt = null;

    private ?int $createdBy = null;

    private ?\DateTimeImmutable $updatedAt = null;

    private ?int $updatedBy = null;

    private ?\DateTimeImmutable $loginAt = null;

    private ?string $defaultLang = null;

    private ?bool $isLogged = null;

    private ?bool $online = null;

    private ?\DateTimeImmutable $registrationAt = null;
    private ?int $loginVia = null;
    private ?int $activeStatus = null;
    private ?Person $person = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function setName(?string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPasswordStatus(): ?int
    {
        return $this->passwordStatus;
    }

    public function setPasswordStatus(?int $passwordStatus): static
    {
        $this->passwordStatus = $passwordStatus;

        return $this;
    }

    public function getPasswordLastChanged(): ?int
    {
        return $this->passwordLastChanged;
    }

    public function setPasswordLastChanged(?int $passwordLastChanged): static
    {
        $this->passwordLastChanged = $passwordLastChanged;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?int $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpdatedBy(): ?int
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?int $updatedBy): static
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function getLoginAt(): ?\DateTimeImmutable
    {
        return $this->loginAt;
    }

    public function setLoginAt(?\DateTimeImmutable $loginAt): static
    {
        $this->loginAt = $loginAt;

        return $this;
    }

    public function getDefaultLang(): ?string
    {
        return $this->defaultLang;
    }

    public function setDefaultLang(?string $defaultLang): static
    {
        $this->defaultLang = $defaultLang;

        return $this;
    }

    public function getIsLogged(): ?bool
    {
        return $this->isLogged;
    }

    public function setIsLogged(?bool $isLogged): static
    {
        $this->isLogged = $isLogged;

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(?bool $online): static
    {
        $this->online = $online;

        return $this;
    }

    public function getRegistrationAt(): ?\DateTimeImmutable
    {
        return $this->registrationAt;
    }

    public function setRegistrationAt(?\DateTimeImmutable $registrationAt): static
    {
        $this->registrationAt = $registrationAt;

        return $this;
    }

    public function getLoginVia(): ?int
    {
        return $this->loginVia;
    }

    public function setLoginVia(?int $loginVia): static
    {
        $this->loginVia = $loginVia;

        return $this;
    }

    public function getActiveStatus(): ?int
    {
        return $this->activeStatus;
    }

    public function setActiveStatus(?int $activeStatus): static
    {
        $this->activeStatus = $activeStatus;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        if (null === $person && null !== $this->person) {
            $this->person->setUser(null);
        }

        if (null !== $person && $this !== $person->getUser()) {
            $person->setUser($this);
        }

        $this->person = $person;

        return $this;
    }

    public function toArray(): array
    {
        $profile = $this->getPerson();
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'profileImage' => $profile->getProfileImage(),
            'phone' => $profile->getPhone(),
            'countryCode' => $profile->getCountryCode(),
            'gender' => $profile->getGender(),
        ];
    }
}
