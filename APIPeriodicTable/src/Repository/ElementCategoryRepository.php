<?php

namespace App\Repository;

use App\Entity\ElementCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElementCategory>
 */
class ElementCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementCategory::class);
    }
    public function getAdminInfo(){
        $qb = $this->createQueryBuilder('c')
            ->select('c.name', 'c.id');
        return $qb->getQuery()->getResult();
    }

}
