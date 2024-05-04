<?php
namespace App\Document;

use App\Repository\AvisClientsRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(repositoryClass: AvisClientsRepository::class)]
class AvisClients
{
    #[MongoDB\Id]
    private ?string $id;

    #[MongoDB\Field(type: 'string')]
    private ?string $Nom;

    #[MongoDB\Field(type: 'string')]
    private ?string $Contenu;

    #[MongoDB\Field(type: 'boolean')]
    private bool $Display;



    public function getId(): ?string
    {
        return $this->id;
    }

    public function setNom(?string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setContenu(?string $Contenu): static
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function getDisplay(): ?bool
    {
        return $this->Display;
    }

    public function setDisplay(bool $Display): static
    {
        $this->Display = $Display;

        return $this;
    }

}