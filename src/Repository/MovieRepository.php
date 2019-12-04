<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    
    public function findByDateAfterNow()
    {
        $entityMenager =  $this->getEntityManager(); 
        $query = $entityMenager->createQuery('
             SELECT p
             FROM App\Entity\Movie p
             WHERE  p.premiere > :premiere
         ')->setParameter('premiere', date('Y-m-d'));

         return $query->getResult();
    }

    public function findByRelease()
    {
        $entityMenager =  $this->getEntityManager(); 
        
        $query = $entityMenager->createQuery('
             SELECT p
             FROM App\Entity\Movie p
             WHERE  p.premiere > :premiere
         ')->setParameter('premiere', date('Y-m-d', strtotime('now  + 7 days')));

         return $query->getResult();
    }
    
}
