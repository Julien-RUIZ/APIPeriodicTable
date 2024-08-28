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

class UpdateDefinitionController extends AbstractController
{
    #[Route('admin/update/definition/{id}', name: 'app_update_definition', requirements:  ['id'=>'\d+'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ElementDefinitions $definitions, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElementDefinitionType::class, $definitions);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', "La mise à jour de la définition est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/Definition/update_definition/index.html.twig', [
            'form' => $form,
        ]);
    }
}
