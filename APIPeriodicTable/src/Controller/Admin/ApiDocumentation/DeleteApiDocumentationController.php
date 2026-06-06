<?php

namespace App\Controller\Admin\ApiDocumentation;

use App\Entity\ApiDocumentation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeleteApiDocumentationController extends AbstractController
{
    #[Route('/delete/api/documentation/{id}', name: 'app_delete_api_documentation', requirements: ['id'=>'\d+'], methods: ['POST'])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(EntityManagerInterface $entityManager, ApiDocumentation $apiDocumentation, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('delete-api-documentation-' . $apiDocumentation->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }
        $entityManager->remove($apiDocumentation);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de la documentation est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
