<?php

namespace App\Entity;

use App\Repository\ListofEventsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListofEventsRepository::class)]
class ListofEvents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Events = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Counts = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCounts(): ?string
    {
        return $this->Counts;
    }

    public function setCounts(?string $Counts): static
    {
        $this->Counts = $Counts;

        return $this;
    }
}
