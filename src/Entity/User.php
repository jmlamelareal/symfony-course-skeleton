<?php

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class User
{
    
    private string $id;
    private string $name;
    private string $email;
    private \DateTimeInterface $createdOn;
    private \DateTimeInterface $updatedOn;


    public function __construct(string $name, string $email)
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->name = $name;
        $this->email = $email;
        $this->createdOn = new \DateTime();
        $this->markAsUpdated();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCreatedOn(): \DateTimeInterface
    {
        return $this->createdOn;
    }

    public function getUpdatedOn(): \DateTimeInterface
    {
        return $this->updatedOn;
    }

    public function markAsUpdated(): void
    {
        $this->updatedOn = new \DateTime();
    }
}
