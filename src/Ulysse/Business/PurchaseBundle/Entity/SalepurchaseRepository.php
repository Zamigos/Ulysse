<?php

namespace Ulysse\Business\PurchaseBundle\Entity;

use Doctrine\ORM\EntityRepository;


class SalepurchaseRepository extends EntityRepository
{

    /**
     * Find Product Sale
     *
     * @param $user_id
     * @return array
     */
    public function findArticlesSale($user_id)
    {
        $query = $this->_em
        ->createQueryBuilder()
        ->addSelect('s')
        ->addSelect('sa')
        ->addSelect('u')
        ->addSelect('p')
        ->from('UlysseBusinessPurchaseBundle:Salepurchase', 's')
        ->innerJoin('s.sale', 'sa')
        ->innerJoin('sa.user', 'u')
        ->innerJoin('s.purchase', 'p')
        ->where('u.id = :user_id')
        ->setParameter('user_id', $user_id)
        ->orderBy('s.id', 'DESC')
        ->getQuery();

        return $query->getResult();
    }

}