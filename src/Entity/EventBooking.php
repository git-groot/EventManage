<?php

namespace App\Entity;

use App\Repository\EventBookingRepository;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $FunctionDate = null;
    private $date;
    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $FunctionTime = null;
    private $time;
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

    public function getFunctionDate(): ?\DateTimeInterface
    {
        return $this->FunctionDate;
    }

    public function setFunctionDate(?\DateTimeInterface $FunctionDate): static
    {
        $this->FunctionDate = $FunctionDate;

        return $this;
    }

    public function getFunctionTime(): ?\DateTimeInterface
    {
        return $this->FunctionTime;
    }

    public function setFunctionTime(?\DateTimeInterface $FunctionTime): static
    {
        $this->FunctionTime = $FunctionTime;

        return $this;
    }

    public function getfunctiondatestr(): ?string
    {
        return $this->date;
    }

    public function setfunctiondatestr(?string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getfunctiontimestr(): ?string
    {
        return $this->time;
    }

    public function setfunctiontimestr(?string $time): static
    {
        $this->time = $time;

        return $this;
    }
}
