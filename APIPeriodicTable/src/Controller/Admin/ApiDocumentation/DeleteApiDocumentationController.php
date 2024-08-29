<?php

namespace App\Controller\Admin\ApiDocumentation;

use App\Entity\ApiDocumentation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeleteApiDocumentationController extends AbstractController
{
    #[Route('/delete/api/documentation/{id}', name: 'app_delete_api_documentation', requirements: ['id'=>'\d+'])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(EntityManagerInterface $entityManager, ApiDocumentation $apiDocumentation): Response
    {
        $entityManager->remove($apiDocumentation);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de la catégorie est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
