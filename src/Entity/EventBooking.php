<?php

namespace App\Entity;

use App\Repository\EventBookingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventBookingRepository::class)]
class EventBooking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PhoneNo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FunctionName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FunctionLocation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Amount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPhoneNo(): ?string
    {
        return $this->PhoneNo;
    }

    public function setPhoneNo(?string $PhoneNo): static
    {
        $this->PhoneNo = $PhoneNo;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(?string $Address): static
    {
        $this->Address = $Address;

        return $this;
    }

    public function getFunctionName(): ?string
    {
        return $this->FunctionName;
    }

    public function setFunctionName(?string $FunctionName): static
    {
        $this->FunctionName = $FunctionName;

        return $this;
    }

    public function getFunctionLocation(): ?string
    {
        return $this->FunctionLocation;
    }

    public function setFunctionLocation(?string $FunctionLocation): static
    {
        $this->FunctionLocation = $FunctionLocation;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->Amount;
    }

    public function setAmount(?string $Amount): static
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }
}
