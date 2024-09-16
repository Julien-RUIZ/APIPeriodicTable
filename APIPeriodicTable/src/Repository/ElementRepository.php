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

    public function getElementsWithAttributAndPagination(array $param=null, $field=null, $page = null, $limit = null ,$id = null){
        $qb = $this->createQueryBuilder('e');
        if($field!=null){
            $fields = explode(',', $field);
            $queryfields = array_map(function ($n){
                if ($n === "elementCategory.name"){return 'c.name AS categoryname';}
                if ($n === "elementGroupe.name"){return 'g.name AS groupename';}
                if ($n != "elementCategory.name" && $n != "elementGroupe.name"){return 'e.'.$n;}
            }, $fields);
            $qb->select(implode(',', $queryfields));
        }
        if($param!=null){
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
                if($page !== null and $limit !== null){
                    $qb->setFirstResult(($page-1)*$limit)
                        ->setMaxResults($limit);
                }
            }
        }else{
            $qb->leftJoin('e.elementCategory', 'c')
                ->leftJoin('e.elementGroupe', 'g');
        }
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
}
