<?php

namespace App\Controller\Admin\Group;

use App\Entity\ElementGroupe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeleteGroupController extends AbstractController
{
    #[Route('/delete/group/{id}', name: 'app_delete_group', requirements: ['id'=>'\d+'], methods: ['POST'])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(ElementGroupe $elementGroupe, EntityManagerInterface $entityManager, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('delete-group-' . $elementGroupe->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }
        $entityManager->remove($elementGroupe);
        $entityManager->flush();
        $this->addFlash('success', "La suppression du groupe est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
