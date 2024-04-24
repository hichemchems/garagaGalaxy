<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Exception;
use MongoDB\Client;

class MongoDBController extends AbstractController
{
    private $uri = 'mongodb+srv://hichemdjacta:hichemgarage123321@galaxygarageparis.qskdsk3.mongodb.net/?retryWrites=true&w=majority&appName=galaxyGarageParis';
    
    #[Route('/mongo/d/b', name: 'app_mongo_d_b')]
    public function index(): Response
    {
        // Replace the placeholder with your Atlas connection string

        $client = new Client($this->uri);

        try {
            // Send a ping to confirm a successful connection
            $client->selectDatabase('admin')->command(['ping' => 1]);
            echo "Pinged your deployment. You successfully connected to MongoDB!\n";
        } catch (Exception $e) {
            printf($e->getMessage());
        }

        return $this->render('mongo_db/index.html.twig');
}
}
