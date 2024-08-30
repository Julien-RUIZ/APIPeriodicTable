<?php

namespace App\Controller\Admin\Element;

use App\Entity\Element;
use App\Form\ElementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UpdateElementController extends AbstractController
{
    #[Route('admin/update/element/{id}', name: 'app_update_element' ,requirements: ['id'=>'\d+'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Request $request, Element $element, EntityManagerInterface $entityManager): Response
    {

        $form = $this->createForm(ElementType::class, $element);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', "La mise à jour de l'atome est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/Element/update_element/index.html.twig', [
            'form' => $form,
        ]);
    }
}
