<?php

namespace App\Entity;

use App\Repository\GuestListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GuestListRepository::class)]
class GuestList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isPresent = null;

    #[ORM\Column(length: 255)]
    private ?string $fullName = null;

    #[ORM\ManyToOne(inversedBy: 'guestLists')]
    private ?Tables $eventTable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPresent(): ?bool
    {
        return $this->isPresent;
    }

    public function setIsPresent(?bool $isPresent): static
    {
        $this->isPresent = $isPresent;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEventTable(): ?Tables
    {
        return $this->eventTable;
    }

    public function setEventTable(?Tables $eventTable): static
    {
        $this->eventTable = $eventTable;

        return $this;
    }
}
