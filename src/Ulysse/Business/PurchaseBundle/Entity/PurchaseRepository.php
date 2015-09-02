<?php

namespace Ulysse\Business\PurchaseBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class PurchaseRepository extends EntityRepository {

    public function findCommandWithArticle($user_id) {
        $query = $this->_em
                ->createQueryBuilder()
                ->addSelect('p')
                ->from('UlysseBusinessPurchaseBundle:Purchase', 'p')
                ->where('p.user = :user_id')
                ->setParameter('user_id', $user_id)
                ->orderBy('p.date', 'DESC')
                ->getQuery();

        return $query->getResult();
    }

    /**
     * Obtenir les produits type qui ont été validé
     * et savoir si des articles en ventes sont disponible pour ces derniers
     *
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function getAllPurchase($page, $nbPerPage) {
        $query = $this->createQueryBuilder('p');

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function countTotalPurchase() {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('count(p)')
                ->from('UlysseBusinessPurchaseBundle:Purchase', 'p');

        return $qb->getQuery()
                        ->getResult();
    }

    public function countPurchasePerMonth() {
        $res = array();
        for ($i = 1; $i <= 12; $i++) {
            $qb = $this->_em->createQueryBuilder();
            $qb->select('count(p)')
            ->from('UlysseBusinessPurchaseBundle:Purchase', 'p')
            ->where('MONTH(p.date) = '.$i)
            ->andWhere('YEAR(p.date) = ' . date('Y'));
            $res[] = $qb->getQuery()
                        ->getSingleResult();
        }

        return $res;
    }

}
