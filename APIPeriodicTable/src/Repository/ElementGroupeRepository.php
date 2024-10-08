<?php

namespace App\Repository;

use App\Entity\ElementGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElementGroupe>
 */
class ElementGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementGroupe::class);
    }

    public function getAdminInfo(){
        $qb = $this->createQueryBuilder('g')
            ->select('g.name', 'g.id');
        return $qb->getQuery()->getResult();
    }
}
