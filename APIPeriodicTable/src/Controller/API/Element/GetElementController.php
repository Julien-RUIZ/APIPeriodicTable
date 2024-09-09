<?php

namespace App\Controller\API\Element;

use App\Entity\Element;
use App\Exception\NotFoundException;
use App\Repository\ElementRepository;
use App\Service\Api\PaginationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

class GetElementController extends AbstractController
{
    /**
     * Endpoint : api/elements
     * Endpoint : api/elements?page={n°page}&limit={limit}
     */
    #[Route('api/elements', name: 'api_elements', methods: ['GET'])]
    public function getAllElements(Request $request, ElementRepository $elementRepository, SerializerInterface $serializer, PaginationService $paginationService, TagAwareCacheInterface $cache): Response
    {
        $query = $request->query;
        $page = $query->get('page');
        $limit = $query->get('limit');
        $donnees = isset($page) && isset($limit) ? $elementRepository->ListeElements($page, $limit) : $elementRepository->findAll();

        $idCache = "getElements-" . ($page ?? 'all') . "-" . ($limit ?? 'all');
        $donnees = $cache->get($idCache,  function (ItemInterface $item) use ($donnees){
            $item->tag("ElementCache");
            return $donnees;
        });

        $nbDonnee = count($elementRepository->findAll());
        if (empty($donnees) or (intval($page)*intval($limit))>$nbDonnee && (intval($page)*intval($limit))<!0){
            throw new NotFoundException();
        }
        $PaginatorInfo = $paginationService->Pagination($page, $limit, $nbDonnee, $donnees);
        $elements = $serializer->serialize($PaginatorInfo, 'json', ['groups'=>'ApiElementTotal']);
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
        if (empty($donnees)){
            throw new NotFoundException();
        }
        $elements = $serializer->serialize($donnees, 'json', ['groups'=>'ApiElementTotal']);
        return new JsonResponse($elements, Response::HTTP_OK, [], true);
    }




}
