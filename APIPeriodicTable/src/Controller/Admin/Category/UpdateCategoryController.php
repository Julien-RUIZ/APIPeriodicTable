<?php

namespace App\Controller\Admin\Category;

use App\Entity\ElementCategory;
use App\Form\ElementCategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UpdateCategoryController extends AbstractController
{
    #[Route('admin/update/category/{id}', name: 'app_update_category', requirements:  ['id'=>'\d+'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ElementCategory $category, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElementCategoryType::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', "La mise à jour de la catégorie est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/Category/update_category/index.html.twig', [
            'form' => $form,
        ]);
    }
}
