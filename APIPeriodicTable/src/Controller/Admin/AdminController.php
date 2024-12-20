<?php

namespace App\Controller\Admin;

use App\Entity\ElementDefinitions;
use App\Entity\User;
use App\Repository\ApiDocumentationRepository;
use App\Repository\ElementCategoryRepository;
use App\Repository\ElementDefinitionsRepository;
use App\Repository\ElementPeriodRepository;
use App\Repository\ElementRepository;
use App\Repository\ElementGroupeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ElementPeriodRepository $periodRepository,
                          ElementRepository $elementRepository,
                          ElementCategoryRepository $categoryRepository,
                          ElementGroupeRepository $groupeRepository,
                          ElementDefinitionsRepository $definitionsRepository,
                          ApiDocumentationRepository $documentationRepository): Response
    {
        $element = $elementRepository->find(id: 1);
        $reflect = new \ReflectionClass($element);
        $properties = $reflect->getProperties();

        $Elements = $elementRepository->getAdminInfo();
        $Category = $categoryRepository->getAdminInfo();
        $Period = $periodRepository->getAdminInfo();
        $Groups = $groupeRepository->getAdminInfo();
        $Definitions = $definitionsRepository->getAdminInfo();
        $ApiDoc = $documentationRepository->getAdminInfo();


        return $this->render('admin/index.html.twig', [
            'Properties'=>$properties, 'Elements' => $Elements, 'Category'=>$Category, 'Groups'=>$Groups, 'Definitions'=>$Definitions, 'ApiDocs'=>$ApiDoc, 'Periods'=> $Period
        ]);
    }
}
