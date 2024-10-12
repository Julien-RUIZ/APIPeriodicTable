<?php

namespace App\Controller\Admin\Group;

use App\Entity\ElementGroupe;
use App\Form\ElementGroupType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CreateGroupController extends AbstractController
{
    #[Route('admin/create/group', name: 'app_create_group')]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $group = new ElementGroupe();
        $form = $this->createForm(ElementGroupType::class, $group);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($group);
            $entityManager->flush();
            $this->addFlash('success', "La création du groupe est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/Group/create_group/index.html.twig', [
            'form' => $form,
        ]);
    }
}
