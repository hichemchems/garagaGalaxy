<?php

namespace App\Controller;

use App\Document\AvisClients;
use App\Form\AvisClientsType; // on utilise celui qu'on a déjà
use App\Repository\AvisClientsRepository;
use Doctrine\ODM\MongoDB\DocumentManager; // Le Manager utilisé par MongoDB et les documents
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/avis/clients')]
class AvisClientsController extends AbstractController
{
    #[Route('/', name: 'app_avis_clients_index', methods: ['GET'])]
    public function index(AvisClientsRepository $avisClientsRepository): Response
    {
        return $this->render('avis_clients/index.html.twig', [
            'avis_clients' => $avisClientsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_avis_clients_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DocumentManager $documentManager): Response
    {
        $avisClient = new AvisClients();
        $form = $this->createForm(AvisClientsType::class, $avisClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $documentManager->persist($avisClient);
            $documentManager->flush();

            return $this->redirectToRoute('app_avis_clients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avis_clients/new.html.twig', [
            'avis_client' => $avisClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_avis_clients_show', methods: ['GET'])]
    public function show(AvisClients $avisClient): Response
    {
        return $this->render('avis_clients/show.html.twig', [
            'avis_client' => $avisClient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_avis_clients_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvisClients $avisClient, DocumentManager $documentManager): Response
    {
        $form = $this->createForm(AvisClientsType::class, $avisClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $documentManager->flush();

            return $this->redirectToRoute('app_avis_clients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avis_clients/edit.html.twig', [
            'avis_client' => $avisClient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_avis_clients_delete', methods: ['POST'])]
    public function delete(Request $request, AvisClients $avisClient, DocumentManager $documentManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avisClient->getId(), $request->getPayload()->get('_token'))) {
            $documentManager->remove($avisClient);
            $documentManager->flush();
        }

        return $this->redirectToRoute('app_avis_clients_index', [], Response::HTTP_SEE_OTHER);
    }
}
