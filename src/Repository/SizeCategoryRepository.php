<?php

namespace App\Repository;

use App\Entity\SizeCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SizeCategory>
 *
 * @method SizeCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method SizeCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method SizeCategory[]    findAll()
 * @method SizeCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SizeCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SizeCategory::class);
    }

    //    /**
    //     * @return SizeCategory[] Returns an array of SizeCategory objects
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

    //    public function findOneBySomeField($value): ?SizeCategory
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
