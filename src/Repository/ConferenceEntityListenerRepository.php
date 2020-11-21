<?php

namespace App\Repository;

use App\Entity\ConferenceEntityListener;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConferenceEntityListener|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConferenceEntityListener|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConferenceEntityListener[]    findAll()
 * @method ConferenceEntityListener[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConferenceEntityListenerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConferenceEntityListener::class);
    }

    // /**
    //  * @return ConferenceEntityListener[] Returns an array of ConferenceEntityListener objects
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
    public function findOneBySomeField($value): ?ConferenceEntityListener
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
