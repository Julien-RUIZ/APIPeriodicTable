<?php

namespace App\Controller\Admin;

use App\Entity\ElementDefinitions;
use App\Repository\ApiDocumentationRepository;
use App\Repository\ElementCategoryRepository;
use App\Repository\ElementDefinitionsRepository;
use App\Repository\ElementRepository;
use App\Repository\ElementGroupeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ElementRepository $elementRepository, ElementCategoryRepository $categoryRepository, ElementGroupeRepository $groupeRepository, ElementDefinitionsRepository $definitionsRepository, ApiDocumentationRepository $documentationRepository): Response
    {
        $Elements = $elementRepository->findAll();
        $Category = $categoryRepository->findAll();
        $Groups = $groupeRepository->findAll();
        $Definitions = $definitionsRepository->findAll();
        $ApiDoc = $documentationRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'Elements' => $Elements, 'Category'=>$Category, 'Groups'=>$Groups, 'Definitions'=>$Definitions, 'ApiDocs'=>$ApiDoc
        ]);
    }
}
