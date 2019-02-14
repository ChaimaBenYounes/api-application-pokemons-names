<?php

namespace App\Repository;

use App\Entity\Faiblesse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Faiblesse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Faiblesse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Faiblesse[]    findAll()
 * @method Faiblesse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaiblesseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Faiblesse::class);
    }

    // /**
    //  * @return Faiblesse[] Returns an array of Faiblesse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Faiblesse
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
