<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Voitures;
use App\Document\AvisClients;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GaragaGalaxy');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
        // check if the user has the ROLE_ADMIN role
        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::linktoRoute('New Register Admin', 'fas fa-plus-square', 'app_register_admin');
            yield MenuItem::linktoRoute('New Register User', 'fas fa-plus-square', 'app_register');
            yield MenuItem::linkToCrud('user', 'fas fa-user', User::class);
        }
        yield MenuItem::linkToCrud('voiture', 'fas fa-car', Voitures::class);
        yield MenuItem::linkToRoute('avis', 'fas fa-quote-left', 'app_avis_clients_index');
    }
}
