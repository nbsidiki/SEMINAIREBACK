<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TacheModificationController extends AbstractController
{
    #[Route('/tache/modification', name: 'app_tache_modification')]
    public function index(): Response
    {
        return $this->render('tache_modification/index.html.twig', [
            'controller_name' => 'TacheModificationController',
        ]);
    }
}
