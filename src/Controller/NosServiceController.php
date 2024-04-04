<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NosServiceController extends AbstractController
{
    #[Route('/nos/service', name: 'app_nos_service')]
    public function index(): Response
    {
        return $this->render('nos_service/index.html.twig', [
            'controller_name' => 'NosServiceController',
        ]);
    }
}
