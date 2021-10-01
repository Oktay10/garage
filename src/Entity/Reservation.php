<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateReservation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebutLoc;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinLoc;

    /**
     * @ORM\Column(type="integer")
     */
    private $essenceConso;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estRendu;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getDateDebutLoc(): ?\DateTimeInterface
    {
        return $this->dateDebutLoc;
    }

    public function setDateDebutLoc(\DateTimeInterface $dateDebutLoc): self
    {
        $this->dateDebutLoc = $dateDebutLoc;

        return $this;
    }

    public function getDateFinLoc(): ?\DateTimeInterface
    {
        return $this->dateFinLoc;
    }

    public function setDateFinLoc(\DateTimeInterface $dateFinLoc): self
    {
        $this->dateFinLoc = $dateFinLoc;

        return $this;
    }

    public function getEssenceConso(): ?int
    {
        return $this->essenceConso;
    }

    public function setEssenceConso(int $essenceConso): self
    {
        $this->essenceConso = $essenceConso;

        return $this;
    }

    public function getEstRendu(): ?bool
    {
        return $this->estRendu;
    }

    public function setEstRendu(bool $estRendu): self
    {
        $this->estRendu = $estRendu;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}
