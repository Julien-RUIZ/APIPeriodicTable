<?php

namespace App\Controller\Admin\ApiDocumentation;

use App\Entity\ApiDocumentation;
use App\Form\ApiDocumentationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UpdateApiDocumentationController extends AbstractController
{
    #[Route('/update/api/documentation/{id}', name: 'app_update_api_documentation', requirements: ['id'=>'\d+'])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(ApiDocumentation $apiDocumentation, EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(ApiDocumentationType::class, $apiDocumentation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', "La mise à jour de la documentation est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/ApiDocumentation/update_api_documentation/index.html.twig', [
            'form' => $form,
        ]);
    }
}
