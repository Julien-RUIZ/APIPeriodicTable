<?php

namespace App\Controller\Admin\Element;

use App\Entity\Element;
use App\Form\ElementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CreateElementController extends AbstractController
{
    #[Route('admin/create/element', name: 'app_create_element')]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $element = new Element();
        $form = $this->createForm(ElementType::class, $element);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($element);
            $entityManager->flush();
            $this->addFlash('success', "La création de l'élément est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/Element/create_element/index.html.twig', [
            'form' => $form,
        ]);
    }
}
