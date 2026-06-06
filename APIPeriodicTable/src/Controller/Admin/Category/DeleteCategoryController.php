<?php

namespace App\Controller\Admin\Category;

use App\Entity\ElementCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeleteCategoryController extends AbstractController
{
    #[Route('/delete/category/{id}', name: 'app_delete_category', requirements: ['id'=>'\d+'], methods: ['POST'])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(ElementCategory $category, EntityManagerInterface $entityManager, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('delete-category-' . $category->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }
        $entityManager->remove($category);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de la catégorie est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
