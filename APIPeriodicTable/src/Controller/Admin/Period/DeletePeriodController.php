<?php

namespace App\Controller\Admin\Period;

use App\Entity\ElementPeriod;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeletePeriodController extends AbstractController
{
    #[Route('/delete/period/{id}', name: 'app_delete_period', requirements:['id'=>'\d+'])]
    public function index(ElementPeriod $elementPeriod, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($elementPeriod);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de la période est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
