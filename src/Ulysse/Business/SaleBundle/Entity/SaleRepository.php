<?php

namespace Ulysse\Business\SaleBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class SaleRepository extends EntityRepository
{

    public function findNew()
    {
        $query = $this->_em
            ->createQueryBuilder()
            ->select('s')
            ->from('UlysseBusinessSaleBundle:Sale', 's')
            ->where('s.stock > :stock')
            ->setParameter('stock', '0')
            ->orderBy('s.id', 'ASC')
            ->getQuery();

        return $query->getResult();
    }

    public function getSalesFront($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('s')
                      ->innerJoin('s.user', 'u')
                      ->where('s.blocked = false')
                      ->andWhere('u.locked = false')
                      ->andWhere('u.blocked = false')
                      ->andWhere('s.stock > :stock')
                      ->orderBy('s.date_added', 'DESC')
                      ->setParameter('stock', '0')
                      ->getQuery();

        $query->setFirstResult(($page - 1) * $nbPerPage)
              ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function getSales($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('s')
                      ->innerJoin('s.user', 'u')
                      ->where('s.blocked = false')
                      ->andWhere('u.locked = false')
                      ->andWhere('u.blocked = false')
                      ->getQuery();

        $query->setFirstResult(($page - 1) * $nbPerPage)
              ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function getBlockedSales($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('s')
                      ->innerJoin('s.user', 'u')
                      ->where('s.blocked = true')
                      ->orWhere('u.locked = true')
                      ->orWhere('u.blocked = true')
                      ->getQuery();

        $query->setFirstResult(($page - 1) * $nbPerPage)
              ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function getFinishedSales($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('s')
                      ->innerJoin('s.user', 'u')
                      ->where('s.stock = 0')
                      ->andWhere('s.blocked = false')
                      ->andWhere('u.locked = false')
                      ->andWhere('u.blocked = false')
                      ->getQuery();

        $query->setFirstResult(($page - 1) * $nbPerPage)
              ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function getPendingSales($page, $nbPerPage)
    {
        $query = $this->createQueryBuilder('s')
                      ->innerJoin('s.user', 'u')
                      ->where('s.stock > 0')
                      ->andWhere('s.blocked = false')
                      ->andWhere('u.locked = false')
                      ->andWhere('u.blocked = false')
                      ->getQuery();

        $query->setFirstResult(($page - 1) * $nbPerPage)
              ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function countFinishedSale()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('count(s)')
           ->from('UlysseBusinessSaleBundle:Sale', 's')
           ->innerJoin('s.user', 'u')
           ->where('s.stock = 0')
           ->andWhere('s.blocked = false')
           ->andWhere('u.locked = false')
           ->andWhere('u.blocked = false');

        return $qb->getQuery()
                  ->getResult();
    }

    public function countPendingSale()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('count(s)')
           ->from('UlysseBusinessSaleBundle:Sale', 's')
           ->innerJoin('s.user', 'u')
           ->where('s.stock > 0')
           ->andWhere('s.blocked = false')
           ->andWhere('u.locked = false')
           ->andWhere('u.blocked = false');

        return $qb->getQuery()
                  ->getResult();
    }

    public function countBlockedSale()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('count(s)')
           ->from('UlysseBusinessSaleBundle:Sale', 's')
           ->innerJoin('s.user', 'u')
           ->where('s.blocked = true')
           ->orWhere('u.locked = true')
           ->orWhere('u.blocked = true');

        return $qb->getQuery()
                  ->getResult();
    }

    public function countSale()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('count(s)')
           ->from('UlysseBusinessSaleBundle:Sale', 's')
           ->innerJoin('s.user', 'u')
           ->where('s.blocked = false')
           ->andWhere('u.locked = false')
           ->andWhere('u.blocked = false');

        return $qb->getQuery()
                  ->getResult();
    }


    /**
     * Requête pour obtenir les ventes disponibles (non bloqué et en stock) à partir d'un produit type
     *
     * @param $IdProduct
     * @return array
     */
    public function findSaleAvailableByProductType($IdProduct)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('s')
           ->from('UlysseBusinessSaleBundle:Sale', 's')
           ->where('s.blocked = false')
           ->andWhere('s.stock > 0')
           ->andWhere('s.product = :idProduct')
           ->setParameter('idProduct', $IdProduct);

        return $qb->getQuery()
                  ->getResult();
    }


    /**
     * Obtenir le nombre de produit disponible pour un produit type donnée
     *
     * @param $idProductType
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findNbProductSaleAvailable($idProductType)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('COUNT(s.id)')
            ->from('UlysseBusinessSaleBundle:Sale', 's')
            ->innerJoin('s.user', 'u')
            ->innerJoin('s.product', 'p')
            ->where('s.blocked = false')
            ->andWhere('u.locked = false')
            ->andWhere('s.blocked = false')
            ->andWhere('s.stock > 0')
            ->andWhere('u.blocked = false')
            ->andWhere('p.id = :idProductType')
            ->setParameter(':idProductType', $idProductType);


        return $qb->getQuery()
                  ->getOneOrNullResult();
    }

    /**
     * Obtenir le prix minimal d'un produit disponible pour ce produit type donné
     *
     * @param $idProductType
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findMinPriceProductSaleAvailable($idProductType)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('MIN(s.price)')
            ->from('UlysseBusinessSaleBundle:Sale', 's')
            ->innerJoin('s.user', 'u')
            ->innerJoin('s.product', 'p')
            ->where('s.blocked = false')
            ->andWhere('u.locked = false')
            ->andWhere('s.blocked = false')
            ->andWhere('s.stock > 0')
            ->andWhere('u.blocked = false')
            ->andWhere('p.id = :idProductType')
            ->setParameter(':idProductType', $idProductType);


        return $qb->getQuery()
            ->getOneOrNullResult();
    }

}
