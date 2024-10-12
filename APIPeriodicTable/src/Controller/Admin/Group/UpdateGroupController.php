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

class UpdateGroupController extends AbstractController
{
    #[Route('admin/update/group/{id}', name: 'app_update_group',requirements: ['id'=>'\d+'] )]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ElementGroupe $elementGroupe, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form= $this->createForm(ElementGroupType::class, $elementGroupe);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', "La mise à jour du est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/Group/update_group/index.html.twig', [
            'form' => $form,
        ]);
    }
}
