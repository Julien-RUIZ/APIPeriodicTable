<?php

namespace App\Repository;

use App\Entity\ElementPeriod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElementPeriod>
 */
class ElementPeriodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementPeriod::class);
    }

    public function getAdminInfo(){
        $qb = $this->createQueryBuilder('p')
            ->select('p.name', 'p.id');
        return $qb->getQuery()->getResult();
    }

}
