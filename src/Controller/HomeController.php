<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Document\AvisClients;
use App\Repository\AvisClientsRepository;//pas utilisé
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Exception;//pas utilisé
use Symfony\Component\HttpFoundation\Session\SessionInterface;//pas utilisé

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
        $avis = $repository->findBy(
            ['Display' => 'true']
        );

        $arg = [
            'voiture' => $voitures,
            'avis' => $avis,
            'controller_name' => 'HomeController',
        ];

        return $this->render('home/index.html.twig', $arg);
    }

    #[Route('/', name: 'app_post_temoignage', methods: 'POST')]
    public function post_temoignage(Request $req): Response
    {
        $nom = $req->request->get('nom'); // recup le nom du témoignage
        $Contenu = $req->request->get('contenu'); // récup le témoignage du témoignage

        $msg = new AvisClients(); // créer un nouvelle objet témoignage

        $msg->setNom($nom); // on définit le nom dans témoignage
        $msg->setContenu($Contenu); // définit le contenu témoignage
        $msg->setDisplay(false); // définit false dans Display

        $this->documentManager->persist($msg);
        $this->documentManager->flush(); // enregistre les changements


        return $this->redirectToRoute('app_home'); //en renvoie sur la page d'acceuil
    }

}
