<?php

namespace App\Repository;

use App\Document\AvisClients;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class AvisClientsRepository extends DocumentRepository
{
    public function __construct(DocumentManager $dm)
    {
        parent::__construct($dm, $dm->getUnitOfWork(),
            $dm->getClassMetadata(AvisClients::class));
    }

    public function findByDisplay(bool $Display): array
    {
        return $this->findBy(['Display' => $Display]);
    }
}