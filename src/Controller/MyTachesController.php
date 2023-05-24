<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tache;

class MyTachesController extends AbstractController
{

    #[Route('/my/taches/{id}', name: 'app_my_taches')]
    public function findTaches(string $id)
    {
        /** @var EntityManagerInterface $em **/
        $em = $this->getDoctrine()->getManager();
        $taches = $em->getRepository(Tache::class)->findAllByUserId($id);



        return $this->render('my_taches/index.html.twig', [
            'taches' => $taches,
        ]);
    }
}
