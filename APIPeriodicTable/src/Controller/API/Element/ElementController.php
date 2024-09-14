<?php

namespace App\Controller\API\Element;

use App\Exception\InvalidPaginationParameterException;
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
     *  Attribute exception : elementCategory.name -> return categoryname
     *  Attribute exception : elementGroupe.name -> return groupename
     */
    #[Route('api/elements', name: 'api_elements', methods: ['GET'])]
    public function getAllElements(Request $request, ElementRepository $elementRepository, SerializerInterface $serializer, PaginationService $paginationService, CacheService $cacheService): Response
    {
        $query = $request->query;
        $field = $query->get('field');
        $page = $query->get('page');
        $limit = $query->get('limit');
        $cacheKey = $field.'-'.$page.'-'.$limit;
        $nbDonnee=118;
        if ((intval($page)*intval($limit))>$nbDonnee or (intval($page)*intval($limit))<=0){
            throw new NotFoundException("Number of elements exceeded depending on the page and limit variables");
        }
        if ( isset($field)){
            $donnees = $elementRepository->getElementsWithAttributAndPagination($field , $page, $limit);
            $NameIdCache= 'getElementsWithAttributesAndPagination'.$cacheKey;
            $NameItemTag = $NameIdCache;
        }
        if ($field===null){
            $donnees = $elementRepository->ListeElements($page, $limit);
            $NameIdCache= 'getElements'.$cacheKey.'All';
            $NameItemTag = $NameIdCache;
        }
        if (empty($donnees)){
            throw new NotFoundException('Aucune donnée trouvé');
        }
        $PaginatInfo = $paginationService->Pagination($page, $limit, $nbDonnee, $donnees);
        $FinalInfo = $serializer->serialize($PaginatInfo, 'json', ['groups'=>'ApiElementTotal']);
        $elements = $cacheService->CacheRequest($FinalInfo, $page, $limit, $NameIdCache, $NameItemTag);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }

    /**
     * Endpoint : api/element/{id}
     * Endpoint : api/element/{id}?field={attribute1, attribute2, etc...}
     * Attribute exception : elementCategory.name -> return categoryname
     * Attribute exception : elementGroupe.name -> return groupename
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
        $elements = $cacheService->CacheRequest($infoElement, null, null, $NameIdCache, $NameItemTag);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }


    /**
     * api/elements/search?{param}={value}
     * api/elements/search?{param}={value}&{param}={value}...
     * api/elements/search?{param}={value}&{param}={value}...&page={npage}&limit={nlimite}
     * api/elements/search?{param}={value}&{param}={value}...field={attribut1,attribut2,etc}
     * api/elements/search?{param}={value}&{param}={value}...field={attribut1,attribut2,etc}&page={npage}&limit={nlimite}
     * Radioactif-> 0=false, 1=true
     * For elementCategory and elementGroupe => use slug
     */
    #[Route('/api/elements/search', name: 'api_element_search', requirements: ['nom'=>'/^[^<>]*$/'], methods: ['GET'])]
    public function getElementByParamAndValue(Request $request, ElementRepository $elementRepository, SerializerInterface $serializer, PaginationService $paginationService, CacheService $cacheService): Response
    {
        $query = $request->query;
        $field = $query->get('field');
        $page = $query->get('page');
        $limit = $query->get('limit');
        $param=[];
        $valeur=[];
        foreach ($request->query as $key=>$value){
            if ($key!='page' && $key!='limit'&& $key!='field'){
                $param[] = $key;
                $valeur[] = $value;
            }
        }
        $params = array_combine($param,$valeur);
        $donnees = $elementRepository->SearchElementsWhithParams($params,$field, $page, $limit);
        if (empty($donnees)){
            throw new NotFoundException();
        }

        $cacheKey =implode('-',$param).'-'.implode('-',$valeur).'-'.$page.'-'.$limit.'-'.$field;
        $NameIdCache= 'getElementByParamAndValue'.$cacheKey;
        $NameItemTag = $NameIdCache;
        $nbDonnee=count($elementRepository->SearchElementsWhithParams($params));

        $PaginatInfo = $paginationService->Pagination($page, $limit, $nbDonnee, $donnees);
        $infoElement = $serializer->serialize($PaginatInfo, 'json', ['groups'=>'ApiElementTotal']);
        $elements = $cacheService->CacheRequest($infoElement, $page, $limit, $NameIdCache, $NameItemTag);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }
}
