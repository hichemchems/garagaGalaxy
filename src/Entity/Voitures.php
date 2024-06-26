<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
class Voitures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Marque = null;

    #[ORM\Column(length: 255)]
    private ?string $Modele = null;

    #[ORM\Column(length: 255)]
    private ?string $Annee = null;

    #[ORM\Column(length: 255)]
    private ?string $Motorisation = null;

    #[ORM\Column(length: 255)]
    private ?string $Immatriculation = null;

    #[ORM\Column(length: 255)]
    private ?string $Kilometrage = null;

    #[ORM\Column]
    private ?int $Prix = null;

    #[ORM\Column(length: 255)]
    private ?string $images = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): static
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->Modele;
    }

    public function setModele(string $Modele): static
    {
        $this->Modele = $Modele;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->Annee;
    }

    public function setAnnee(string $Annee): static
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getMotorisation(): ?string
    {
        return $this->Motorisation;
    }

    public function setMotorisation(string $Motorisation): static
    {
        $this->Motorisation = $Motorisation;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->Immatriculation;
    }

    public function setImmatriculation(string $Immatriculation): static
    {
        $this->Immatriculation = $Immatriculation;

        return $this;
    }

    public function getKilometrage(): ?string
    {
        return $this->Kilometrage;
    }

    public function setKilometrage(string $Kilometrage): static
    {
        $this->Kilometrage = $Kilometrage;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): static
    {
        $this->images = $images;

        return $this;
    }
}
