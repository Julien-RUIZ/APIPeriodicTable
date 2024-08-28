<?php

namespace App\Controller\Admin\Group;

use App\Entity\ElementGroupe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeleteGroupController extends AbstractController
{
    #[Route('/delete/group/{id}', name: 'app_delete_group', requirements:  ['id'=>'\d+'])]
    public function index(ElementGroupe $elementGroupe, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($elementGroupe);
        $entityManager->flush();

        $this->addFlash('success', "La suppression du groupe est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
