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

    #[Route('/mytaches', name: 'app_my_taches')]
    public function findTaches( EntityManagerInterface $entityManager)
    {
        $taches = $entityManager->getRepository(Tache::class)->findAll();



        return $this->render('my_taches/taches.html.twig', [
            'taches' => $taches,
        ]);
    }

    #[Route('/addtaches', name: 'my_taches')]
    public function addTache(Request $request, EntityManagerInterface $entityManager)
    {
        $tache = new Tache();
        $tache->setUser($this->getUser());
        $form = $this->createForm(AddTachesType::class ,$tache);
        $form->handleRequest($request);

        if ($form->isSubmitted() ){
            $entityManager->persist($tache);
            $entityManager->flush();
            return $this->redirectToRoute('app_my_taches');
        }


        return $this->render('my_taches/index.html.twig', [
            'tache' => $tache,
            'form' => $form,
        ]);
    }
}
