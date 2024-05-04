<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Document\AvisClients;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    private $entityManager;
    private $documentManager;

    public function __construct(EntityManagerInterface $entityManager, DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home', methods: 'GET')]
    public function index(): Response
    {
        $repository = $this->entityManager->getRepository(Voitures::class);
        $voitures = $repository->findAll();

        $repository = $this->documentManager->getRepository(AvisClients::class);
        $avis = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'voiture' => $voitures,
            'avis' => $avis,
            'controller_name' => 'HomeController',
        ]);
    }

}
