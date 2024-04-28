<?php

namespace App\Repository;

use App\Entity\ProductGender;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductGender>
 *
 * @method ProductGender|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductGender|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductGender[]    findAll()
 * @method ProductGender[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductGenderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductGender::class);
    }

    //    /**
    //     * @return ProductGender[] Returns an array of ProductGender objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ProductGender
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
