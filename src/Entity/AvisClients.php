<?php

namespace App\Entity;

use App\Repository\AvisClientsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisClientsRepository::class)]
class AvisClients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Contenu = null;

    #[ORM\Column]
    private ?bool $Display = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): static
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function isDisplay(): ?bool
    {
        return $this->Display;
    }

    public function setDisplay(bool $Display): static
    {
        $this->Display = $Display;

        return $this;
    }
}
