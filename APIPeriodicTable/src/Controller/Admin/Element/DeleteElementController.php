<?php

namespace App\Controller\Admin\Element;


use App\Entity\Element;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DeleteElementController extends AbstractController
{
    #[Route('/delete/element/{id}', name: 'app_delete_element', requirements:  ['id'=>'\d+'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Element $element, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($element);
        $entityManager->flush();
        $this->addFlash('success', "La suppression de l'élément est réalisée avec succès.");
        return $this->redirectToRoute('app_admin');
    }
}
