<?php

namespace App\Repository;

use App\Entity\AttributeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AttributeType>
 *
 * @method AttributeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributeType[]    findAll()
 * @method AttributeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributeTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributeType::class);
    }

    //    /**
    //     * @return AttributeType[] Returns an array of AttributeType objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AttributeType
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
