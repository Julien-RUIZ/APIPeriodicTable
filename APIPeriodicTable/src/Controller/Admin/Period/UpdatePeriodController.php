<?php

namespace App\Controller\Admin\Period;

use App\Entity\ElementPeriod;
use App\Form\ElementPeriodType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UpdatePeriodController extends AbstractController
{
    #[Route('admin/update/period/{id}', name: 'app_update_period', requirements:  ['id'=>'\d+'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(ElementPeriod $elementPeriod, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form=$this->createForm(ElementPeriodType::class, $elementPeriod);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', "La mise à jour de la période est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/Period/update_period/index.html.twig', [
            'form' => $form,
        ]);
    }
}
