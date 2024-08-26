<?php

namespace App\Controller\Element;

use App\Entity\Element;
use App\Repository\ElementDefinitionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReadElementController extends AbstractController
{
    #[Route('/read/atom/{id}', name: 'app_read_atom', requirements: ['id'=>'\d+'])]
    public function index(Element $atome, ElementDefinitionsRepository $definitionsRepository): Response
    {
       $definition = $definitionsRepository->findAll();
        foreach ($definition as $value){
            $listeDefinition[$value->getId()] = $value;
        }

        return $this->render('Element/read_element/index.html.twig', [
            'atome' => $atome, 'listeDefinition'=> $listeDefinition
        ]);
    }
}
