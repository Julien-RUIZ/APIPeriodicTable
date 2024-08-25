<?php

namespace App\Controller\Atome;

use App\Entity\Atome;
use App\Repository\AtomeDefinitionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReadAtomController extends AbstractController
{
    #[Route('/read/atom/{id}', name: 'app_read_atom', requirements: ['id'=>'\d+'])]
    public function index(Atome $atome, AtomeDefinitionsRepository $definitionsRepository): Response
    {
       $definition = $definitionsRepository->findAll();
        foreach ($definition as $value){
            $listeDefinition[$value->getId()] = $value;
        }

        return $this->render('Atom/read_atom/index.html.twig', [
            'atome' => $atome, 'listeDefinition'=> $listeDefinition
        ]);
    }
}
