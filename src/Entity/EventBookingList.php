<?php

namespace App\Entity;

use App\Repository\EventBookingListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventBookingListRepository::class)]
class EventBookingList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?EventBooking $EvenetBookin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Events = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Count = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenetBookin(): ?EventBooking
    {
        return $this->EvenetBookin;
    }

    public function setEvenetBookin(?EventBooking $EvenetBookin): static
    {
        $this->EvenetBookin = $EvenetBookin;

        return $this;
    }

    public function getEvents(): ?string
    {
        return $this->Events;
    }

    public function setEvents(?string $Events): static
    {
        $this->Events = $Events;

        return $this;
    }

    public function getCount(): ?string
    {
        return $this->Count;
    }

    public function setCount(?string $Count): static
    {
        $this->Count = $Count;

        return $this;
    }
}
