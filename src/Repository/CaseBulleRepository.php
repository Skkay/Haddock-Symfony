<?php

namespace App\Repository;

use App\Entity\CaseBulle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CaseBulle|null find($id, $lockMode = null, $lockVersion = null)
 * @method CaseBulle|null findOneBy(array $criteria, array $orderBy = null)
 * @method CaseBulle[]    findAll()
 * @method CaseBulle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaseBulleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CaseBulle::class);
    }

    // /**
    //  * @return CaseBulle[] Returns an array of CaseBulle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CaseBulle
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
