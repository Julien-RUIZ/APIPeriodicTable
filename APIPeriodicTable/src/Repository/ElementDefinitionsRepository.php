<?php

namespace App\Repository;

use App\Entity\ElementDefinitions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElementDefinitions>
 */
class ElementDefinitionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementDefinitions::class);
    }

    public function getAdminInfo(){
        $qb = $this->createQueryBuilder('d')
            ->select('d.name', 'd.id');
        return $qb->getQuery()->getResult();
    }
}
