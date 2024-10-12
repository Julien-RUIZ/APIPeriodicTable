<?php

namespace App\Controller\Profil;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index( UserRepository $userRepository, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hasher): Response
    {
        $user = $userRepository->findOneBy(['id'=>$this->getUser()->getId()]);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
          $userData = $request->request->all('user');
            $password = $userData['password'];
            $user->setPassword($hasher->hashPassword($user, $password));
            $entityManager->flush();
            $this->addFlash('success', "La modification des données est réalisée avec succès.");
            return $this->redirectToRoute('app_profil');
        }
        return $this->render('profil/index.html.twig', [
            'user'=>$user, 'form'=>$form
        ]);
    }
}
