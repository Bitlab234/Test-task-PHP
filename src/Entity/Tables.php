<?php

namespace App\Entity;

use App\Repository\TablesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TablesRepository::class)]
class Tables
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $tableNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $maxGuests = null;

    #[ORM\Column(nullable: true)]
    private ?int $guestsCount = null;

    #[ORM\Column(nullable: true)]
    private ?int $presentGuests = null;

    /**
     * @var Collection<int, GuestList>
     */
    #[ORM\OneToMany(targetEntity: GuestList::class, mappedBy: 'eventTable')]
    private Collection $guestLists;

    public function __construct()
    {
        $this->guestLists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTableNumber(): ?int
    {
        return $this->tableNumber;
    }

    public function setTableNumber(int $tableNumber): static
    {
        $this->tableNumber = $tableNumber;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMaxGuests(): ?int
    {
        return $this->maxGuests;
    }

    public function setMaxGuests(int $maxGuests): static
    {
        $this->maxGuests = $maxGuests;

        return $this;
    }

    public function getGuestsCount(): ?int
    {
        return $this->guestsCount;
    }

    public function setGuestsCount(?int $guestsCount): static
    {
        $this->guestsCount = $guestsCount;

        return $this;
    }

    public function getPresentGuests(): ?int
    {
        return $this->presentGuests;
    }

    public function setPresentGuests(?int $presentGuests): static
    {
        $this->presentGuests = $presentGuests;

        return $this;
    }

    /**
     * @return Collection<int, GuestList>
     */
    public function getGuestLists(): Collection
    {
        return $this->guestLists;
    }

    public function addGuestList(GuestList $guestList): static
    {
        if (!$this->guestLists->contains($guestList)) {
            $this->guestLists->add($guestList);
            $guestList->setEventTable($this);
        }

        return $this;
    }

    public function removeGuestList(GuestList $guestList): static
    {
        if ($this->guestLists->removeElement($guestList)) {
            // set the owning side to null (unless already changed)
            if ($guestList->getEventTable() === $this) {
                $guestList->setEventTable(null);
            }
        }

        return $this;
    }
}
