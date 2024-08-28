<?php

namespace App\Controller\Admin\Definition;

use App\Entity\ElementDefinitions;
use App\Form\ElementDefinitionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CreateDefinitionController extends AbstractController
{
    #[Route('admin/create/definition', name: 'app_create_definition')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $definition = new ElementDefinitions();
        $form = $this->createForm(ElementDefinitionType::class, $definition);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($definition);
            $entityManager->flush();
            $this->addFlash('success', "La création de la définition est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/Definition/create_definition/index.html.twig', [
            'form' => $form,
        ]);
    }
}
