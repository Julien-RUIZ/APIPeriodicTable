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
        $reflect = new \ReflectionClass($element);
        $properties = $reflect->getProperties();
        $definition = $definitionsRepository->findAll();
        foreach ($properties as $property) {
            $propertiesElement[] = $property->getName();
        }
        foreach ($definition as $value){
            $listeDefinition[$value->getNamePropertyElement()] = $value;
        }
        //dd($propertiesElement, $element, $listeDefinition);
        return $this->render('Element/read_element/index.html.twig', [
            'elements' => $element, 'listeDefinition'=> $listeDefinition, 'propertiesElements'=>$propertiesElement
        ]);
    }
}
