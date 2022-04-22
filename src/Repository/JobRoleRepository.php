<?php

namespace App\Repository;

use App\Entity\JobRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobRole[]    findAll()
 * @method JobRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobRole::class);
    }

    // /**
    //  * @return JobRole[] Returns an array of JobRole objects
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
    public function findOneBySomeField($value): ?JobRole
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
