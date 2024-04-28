<?php

namespace App\Repository;

use App\Entity\SizeOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SizeOption>
 *
 * @method SizeOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method SizeOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method SizeOption[]    findAll()
 * @method SizeOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SizeOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SizeOption::class);
    }

    //    /**
    //     * @return SizeOption[] Returns an array of SizeOption objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SizeOption
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
