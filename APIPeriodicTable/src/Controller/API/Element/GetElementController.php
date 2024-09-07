<?php

namespace App\Controller\API\Element;

use App\Entity\Element;
use App\Exception\NotFoundException;
use App\Repository\ElementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GetElementController extends AbstractController
{
    #[Route('api/elements', name: 'api_elements', methods: ['GET'])]
    public function getAllElements(ElementRepository $elementRepository, SerializerInterface $serializer): Response
    {
        $donnees = $elementRepository->findAll();
        $elements = $serializer->serialize($donnees, 'json', ['groups'=>'ApiElementTotal']);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }

    #[Route('api/element/{id}', name: 'api_element', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function getElement(int $id,ElementRepository $elementRepository, SerializerInterface $serializer): Response
    {
        $donnees = $elementRepository->findBy(['id'=>$id]);
        $elements = $serializer->serialize($donnees, 'json', ['groups'=>'ApiElementTotal']);
        if (empty($donnees)){
            throw new NotFoundException();
        }
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }

    #[Route('/api/elements/search', name: 'api_element_search', requirements: ['nom'=>'/^[^<>]*$/'], methods: ['GET'])]
    public function getElementByParamAndValue(Request $request, ElementRepository $elementRepository, SerializerInterface $serializer): Response
    {
        $param=[];
        $valeur=[];
        foreach ($request->query as $key=>$value){
            $param[] = $key;
            $valeur[] = $value;
        }
        $params = array_combine($param,$valeur);
        $donnees = $elementRepository->findBy($params);
        $elements = $serializer->serialize($donnees, 'json', ['groups'=>'ApiElementTotal']);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }




}
