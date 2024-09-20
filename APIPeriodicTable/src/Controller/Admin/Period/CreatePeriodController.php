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

class CreatePeriodController extends AbstractController
{
    #[Route('/create/period', name: 'app_create_period')]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $period = new ElementPeriod();
        $form= $this->createForm(ElementPeriodType::class, $period);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($period);
            $entityManager->flush();
            $this->addFlash('success', "La création de la période est réalisée avec succès.");
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/Period/create_period/index.html.twig', [
            'form' => $form,
        ]);
    }
}
