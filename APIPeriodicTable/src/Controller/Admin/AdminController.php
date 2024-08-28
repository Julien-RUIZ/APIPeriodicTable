<?php

namespace App\Controller\Admin;

use App\Entity\ElementDefinitions;
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
    public function index(ElementRepository $atomeRepository, ElementCategoryRepository $categoryRepository, ElementGroupeRepository $groupeRepository, ElementDefinitionsRepository $definitionsRepository): Response
    {
        $Atoms = $atomeRepository->findAll();
        $Category = $categoryRepository->findAll();
        $Groups = $groupeRepository->findAll();
        $Definitions = $definitionsRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'Atoms' => $Atoms, 'Category'=>$Category, 'Groups'=>$Groups, 'Definitions'=>$Definitions
        ]);
    }
}
