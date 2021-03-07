<?php

namespace App\Entity;

use App\Repository\UserDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserDataRepository::class)
 */
class UserData
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $coldwater;

    /**
     * @ORM\Column(type="integer")
     */
    private $hotwater;

    /**
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColdwater(): ?int
    {
        return $this->coldwater;
    }

    public function setColdwater(int $coldwater): self
    {
        $this->coldwater = $coldwater;

        return $this;
    }

    public function getHotwater(): ?int
    {
        return $this->hotwater;
    }

    public function setHotwater(int $hotwater): self
    {
        $this->hotwater = $hotwater;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getAddress(): ?User
    {
        return $this->address;
    }

    public function setAddress(User $address): self
    {
        $this->address = $address;

        return $this;
    }
}
