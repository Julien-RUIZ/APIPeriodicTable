<?php

namespace App\Controller\Admin\Period;

use App\Entity\ElementPeriod;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeletePeriodController extends AbstractController
{
    #[IsGranted('ROLE_SUPER_ADMIN')]
    #[Route('/delete/period/{id}', name: 'app_delete_period', requirements: ['id'=>'\d+'], methods: ['POST'])]
    public function index(ElementPeriod $elementPeriod, EntityManagerInterface $entityManager, Request $request): Response
    {
        if (!$this->isCsrfTokenValid('delete-period-' . $elementPeriod->getId(), $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }
        $entityManager->remove($elementPeriod);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de la période est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
