<?php

namespace App\Controller\Element;

use App\Entity\Element;
use App\Repository\ElementDefinitionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReadElementController extends AbstractController
{
    #[Route('/read/element/{id}', name: 'app_read_element', requirements: ['id'=>'\d+'])]
    public function index(Element $element, ElementDefinitionsRepository $definitionsRepository): Response
    {
       $definition = $definitionsRepository->findAll();
        foreach ($definition as $value){
            $listeDefinition[$value->getId()] = $value;
        }
        return $this->render('Element/read_element/index.html.twig', [
            'elements' => $element, 'listeDefinition'=> $listeDefinition
        ]);
    }
}
