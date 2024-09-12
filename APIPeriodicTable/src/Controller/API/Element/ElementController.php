<?php

namespace App\Controller\API\Element;


use App\Exception\NotFoundException;
use App\Repository\ElementRepository;
use App\Service\Api\CacheService;
use App\Service\Api\PaginationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ElementController extends AbstractController
{
    /**
     * Endpoint : api/elements
     * Endpoint : api/elements?field={attribut1,attribut2,etc}
     * Endpoint : api/elements?page={n°page}&limit={limit}
     * Endpoint : api/elements?field={attribut1,attribut2,etc}&page={nbPage}&limit={nbLimit}
     */
    #[Route('api/elements', name: 'api_elements', methods: ['GET'])]
    public function getAllElements(Request $request, ElementRepository $elementRepository, SerializerInterface $serializer, PaginationService $paginationService, CacheService $cacheService): Response
    {
        $query = $request->query;
        $field = $query->get('field');
        $page = $query->get('page');
        $limit = $query->get('limit');
        $cacheKey = $field.'-'.$page.'-'.$limit;

        if ($page===null && $limit===null && isset($field)){
            $donnees = $elementRepository->getElementsWithAttribut($field);
            $NameIdCache= 'getElementsWithAttributes'.$cacheKey;
            $NameItemTag = $NameIdCache;
        }
        if (isset($page) && isset($limit) && isset($field)){
            $donnees = $elementRepository->getElementsWithAttributAndPagination($field , $page, $limit);
            $NameIdCache= 'getElementsWithAttributesAndPagination'.$cacheKey;
            $NameItemTag = $NameIdCache;
        }
        if (isset($page) && isset($limit) && $field===null){
            $donnees = $elementRepository->ListeElements($page, $limit);
            $NameIdCache= 'getElementsWithPagination'.$cacheKey;
            $NameItemTag = $NameIdCache;
        }
        if ($page===null && $limit===null && $field===null){
            $donnees = $elementRepository->findAll();
            $NameIdCache= 'getElements'.$cacheKey.'All';
            $NameItemTag = $NameIdCache;
        }
        $nbDonnee=118;
        if (empty($donnees) or (intval($page)*intval($limit))>$nbDonnee && (intval($page)*intval($limit))<!0){
            throw new NotFoundException();
        }
        $PaginatInfo = $paginationService->Pagination($page, $limit, $nbDonnee, $donnees);
        $FinalInfo = $serializer->serialize($PaginatInfo, 'json', ['groups'=>'ApiElementTotal']);
        $elements = $cacheService->CacheRequest($FinalInfo, $page, $limit, $NameIdCache, $NameItemTag);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }

    /**
     * Endpoint : api/element/{id}
     * Endpoint : api/element/{id}?field={attribute1, attribute2, etc...}
     */
    #[Route('api/element/{id}', name: 'api_element', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function getElement(int $id,ElementRepository $elementRepository, SerializerInterface $serializer, Request $request, CacheService $cacheService): Response
    {
        $query = $request->query;
        $field = $query->get('field');
        $cacheKey = $field.'-'.$id;
        if ($field === null){
            $donnees = $elementRepository->findBy(['id'=>$id]);
            $NameIdCache= 'getElementWithoutAttributes'.$cacheKey;
            $NameItemTag = $NameIdCache;
        }
        if ($field !== null){
            $donnees = $elementRepository->getElementsWithAttribut($field, $id);
            $NameIdCache= 'getElementsWithAttributes'.$cacheKey;
            $NameItemTag = $NameIdCache;
        }
        if (empty($donnees)){
            throw new NotFoundException();
        }
        $infoElement = $serializer->serialize($donnees, 'json', ['groups'=>'ApiElementTotal']);
        $elements = $elements = $cacheService->CacheRequest($infoElement, null, null, $NameIdCache, $NameItemTag);
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
        if (empty($donnees)){
            throw new NotFoundException();
        }
        $elements = $serializer->serialize($donnees, 'json', ['groups'=>'ApiElementTotal']);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }
}
