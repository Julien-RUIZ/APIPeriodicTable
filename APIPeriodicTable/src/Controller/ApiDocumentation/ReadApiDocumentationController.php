<?php

namespace App\Controller\ApiDocumentation;

use App\Repository\ApiDocumentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ReadApiDocumentationController extends AbstractController
{
    #[Route('/read/api/documentation', name: 'app_read_api_documentation')]
    #[IsGranted('ROLE_USER')]
    public function index(ApiDocumentationRepository $documentationRepository): Response
    {
        $apiDocs = $documentationRepository->findAll();

        return $this->render('apiDocumentation/read_api_documentation/index.html.twig', [
            'apiDocs' => $apiDocs
        ]);
    }
}
