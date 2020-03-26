<?php

namespace App\Repository;

use App\Entity\Jurons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Jurons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jurons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jurons[]    findAll()
 * @method Jurons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JuronsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jurons::class);
    }

    // /**
    //  * @return Jurons[] Returns an array of Jurons objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jurons
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
