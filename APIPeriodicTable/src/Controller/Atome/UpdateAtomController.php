<?php

namespace App\Controller\Atome;

use App\Entity\Atome;
use App\Form\AtomeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UpdateAtomController extends AbstractController
{
    #[Route('/update/atom/{id}', name: 'app_update_atom' ,requirements: ['id'=>'\d+'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(Request $request, Atome $atome, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AtomeType::class, $atome);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', "La mise à jour de l'atome est réalisée avec succès.");
            return $this->redirectToRoute('app_home');
        }

        return $this->render('Atom/update_atom/index.html.twig', [
            'form' => $form,
        ]);
    }
}
