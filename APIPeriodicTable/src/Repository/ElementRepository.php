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


    public function getElementsWithAttribut($attribut,  $id = null){
        $attibuts = explode(',', $attribut);
        $queryAttributs = array_map(function ($n){return 'e.'.$n; }, $attibuts);

        $qb = $this->createQueryBuilder('e')
            ->select($queryAttributs);
        if ($id != null) {
            $qb->where('e.id = :id')
                ->setParameter('id', $id);
        }
        return $qb->getQuery()->getResult();
    }

    public function getElementsWithAttributAndPagination($attribut, $page = null, $limit = null ,$id = null){
        $attibuts = explode(',', $attribut);
        $queryAttributs = array_map(function ($n){return 'e.'.$n; }, $attibuts);

        $qb = $this->createQueryBuilder('e')
            ->select($queryAttributs);
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
