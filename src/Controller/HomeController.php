<?php

namespace App\Controller;

use App\Entity\Voitures;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $repository = $this->entityManager->getRepository(Voitures::class);
        $voitures = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'voiture' => $voitures,
            'controller_name' => 'HomeController',
        ]);
    }

}
