<?php

namespace App\Controller\Admin\Element;


use App\Entity\Element;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeleteElementController extends AbstractController
{
    #[Route('/delete/element/{id}', name: 'app_delete_element', requirements: ['id'=>'\d+'], methods: ['POST'])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(Element $element, EntityManagerInterface $entityManager, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('delete-element-' . $element->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }
        $entityManager->remove($element);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de l'élément est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
