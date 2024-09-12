<?php

namespace App\Repository;

use App\Entity\Element;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Element>
 */
class ElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Element::class);
    }

    public function ListeElements($page, $limit){
        return $this->createQueryBuilder('e')
            ->setFirstResult(($page-1)*$limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getElementsWithAttributAndPagination($attribut, $page = null, $limit = null ,$id = null){
        $attibuts = explode(',', $attribut);
        $queryAttributs = array_map(function ($n){
            if ($n === "elementCategory.name"){return 'c.name AS categoryname';}
            if ($n === "elementGroupe.name"){return 'g.name AS groupename';}
            if ($n != "elementCategory.name" && $n != "elementGroupe.name"){return 'e.'.$n;}
        }, $attibuts);
        $qb = $this->createQueryBuilder('e')
            ->select(implode(',', $queryAttributs))
            ->leftJoin('e.elementCategory', 'c')
            ->leftJoin('e.elementGroupe', 'g');
        if ($id !== null) {
            $qb->where('e.id = :id')
                ->setParameter('id', $id);
        }
        if($page !== null and $limit !== null){
            $qb->setFirstResult(($page-1)*$limit)
                ->setMaxResults($limit);
        }
        return $qb->getQuery()->getResult();
    }

    public function getElementsWithAttribut($attribut,  $id = null){
        $attibuts = explode(',', $attribut);
        $queryAttributs = array_map(function ($n){
            if ($n === "elementCategory.name"){return 'c.name AS categoryname';}
            if ($n === "elementGroupe.name"){return 'g.name AS groupename';}
            if ($n != "elementCategory.name" && $n != "elementGroupe.name"){return 'e.'.$n;}
            }, $attibuts);
        $qb = $this->createQueryBuilder('e')
            ->select(implode(',', $queryAttributs))
            ->leftJoin('e.elementCategory', 'c')
            ->leftJoin('e.elementGroupe', 'g');
        if ($id != null) {
            $qb->where('e.id = :id')
                ->setParameter('id', $id);
        }
        return $qb->getQuery()->getResult();
    }

    public function SearchElementsWhithParams(array $param){
        $qb = $this->createQueryBuilder('e');
            foreach ($param as $key=>$value){
                if ($key==='elementCategory'){
                    $qb->leftJoin('e.elementCategory', 'ec')
                        ->setParameter($key, $value)
                        ->andwhere('ec.slug = :'.$key);
                }
                if ($key==='elementGroupe'){
                    $qb->leftJoin('e.elementGroupe', 'eg')
                        ->setParameter($key, $value)
                        ->andwhere('eg.slug = :'.$key);
                }
                if ($key!=='elementCategory' && $key!=='elementGroupe'){
                    $qb->andwhere('e.'.$key.' = :'.$key)
                        ->setParameter($key, $value) ;
                }
            }
        return $qb->getQuery()->getResult();
    }

    public function SearchElementsWhithParamsAndPagination($param, $page=null, $limit=null){
        $qb = $this->createQueryBuilder('e');
        foreach ($param as $key=>$value){
            $qb->andwhere('e.'.$key.' = :'.$key)
                ->setParameter($key, $value) ;
        }
        if($page !== null and $limit !== null){
            $qb->setFirstResult(($page-1)*$limit)
                ->setMaxResults($limit);
        }
        return $qb->getQuery()->getResult();
    }


    //    /**
    //     * @return Element[] Returns an array of Element objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Element
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
