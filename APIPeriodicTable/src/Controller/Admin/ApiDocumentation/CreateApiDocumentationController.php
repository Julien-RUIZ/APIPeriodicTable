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

class CreateApiDocumentationController extends AbstractController
{
    #[Route('/create/api/documentation', name: 'app_create_api_documentation')]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $apiDoc = new ApiDocumentation();
        $form = $this->createForm(ApiDocumentationType::class, $apiDoc);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($apiDoc);
            $entityManager->flush();
            $this->addFlash('success', 'La création de votre documentation est réalisée avec succés.');
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/ApiDocumentation/create_api_documentation/index.html.twig', [
            'form' => $form
        ]);
    }
}
