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

class CreateCategoryController extends AbstractController
{
    #[Route('admin/create/category', name: 'app_create_category')]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new ElementCategory();
        $form=$this->createForm(ElementCategoryType::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($category);
            $entityManager->flush();
            $this->addFlash('success', "La création de la catégorie est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/Category/create_category/index.html.twig', [
            'form' => $form,
        ]);
    }
}
