<?php

namespace App\Repository;

use App\Entity\ApiDocumentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ApiDocumentation>
 */
class ApiDocumentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApiDocumentation::class);
    }

    public function getAdminInfo(){
        $qb = $this->createQueryBuilder('da')
            ->select('da.ButtonTitle', 'da.id');
        return $qb->getQuery()->getResult();
    }
}
