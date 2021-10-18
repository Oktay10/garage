<?php

namespace App\Repository;

use App\Entity\Vehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicule[]    findAll()
 * @method Vehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicule::class);
    }

    // /**
    //  * @return Vehicule[] Returns an array of Vehicule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function searchCar($critere)
    {
        //dd($critere);
        return $this->createQueryBuilder('v')
            ->andWhere('v.marque = :marque')
            ->setParameter('marque', $critere->getMarque())
            ->andWhere('v.modele = :modele')
            ->setParameter('modele', $critere->getModele())
            ->andWhere('v.typeVehicule = :typeVehicule')
            ->setParameter('typeVehicule', $critere->getTypeVehicule())
            ->andWhere('v.categorie = :categorie')
            ->setParameter('categorie', $critere->getCategorie())
            ->andWhere('v.estDispo = :estDispo')
            ->setParameter('estDispo', 0)
            ->getQuery()
            ->getResult();
    }
    
}
