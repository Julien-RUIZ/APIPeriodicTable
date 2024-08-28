<?php

namespace App\Controller\Admin\Definition;

use App\Entity\ElementDefinitions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeleteDefinitionController extends AbstractController
{
    #[Route('/delete/definition/{id}', name: 'app_delete_definition', requirements:  ['id'=>'\d+'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ElementDefinitions $elementDefinitions, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($elementDefinitions);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de la définition est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}