<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tache;
use App\Form\AddTachesType;
use Symfony\Component\HttpFoundation\Request;

class MyTachesController extends AbstractController
{

    #[Route('/mytaches/{id}', name: 'app_my_taches')]
    public function findTaches(string $id, EntityManagerInterface $entityManager)
    {
        $taches = $entityManager->getRepository(Tache::class)->findAllByUserId($id);



        return $this->render('my_taches/index.html.twig', [
            'taches' => $taches,
        ]);
    }

    #[Route('/addtaches', name: 'my_taches')]
    public function addTache(Request $request, EntityManagerInterface $entityManager)
    {
        $taches = new Tache();
        $form = $this->createForm(AddTachesType::class ,$taches);
        $form->handleRequest($request);

        if ($form->isSubmitted() ){
            
        }


        return $this->render('my_taches/index.html.twig', [
            'taches' => $taches,
        ]);
    }
}
