<?php

namespace App\Repository;

use App\Entity\Pointderelais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pointderelais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pointderelais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pointderelais[]    findAll()
 * @method Pointderelais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointderelaisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pointderelais::class);
    }
    
    public function save(Pointderelais $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Pointderelais $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
