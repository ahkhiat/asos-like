<?php

namespace App\Repository;

use App\Entity\ProductItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductItem>
 *
 * @method ProductItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductItem[]    findAll()
 * @method ProductItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductItem::class);
    }

    //    /**
    //     * @return ProductItem[] Returns an array of ProductItem objects
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

    //    public function findOneBySomeField($value): ?ProductItem
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
