<?php

namespace Ulysse\Business\ProductBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ProductRepository
 *
 */
class ProductRepository extends EntityRepository {

    /**
     * Obtenir les produits type qui ont été validé
     * et savoir si des articles en ventes sont disponible pour ces derniers
     *
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function findAllProduct($page, $nbPerPage) {
        $query = $this->createQueryBuilder('p')
                ->select('p AS product, COUNT(s.id) AS nbProduct, MIN(s.price) AS minPrice')
                //On prends les "sales" qui sont disponibles et non bloquées
                ->leftJoin('p.sale', 's', 'WITH', 's.blocked = 0 AND s.stock > 0')
                //On prend les produits validés
                ->where('p.state = 1')
                ->groupBy('p');

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    /**
     * Trouver les produits par catégories
     *
     * @param $category_id
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function findAllProductByCategory($category_id, $page, $nbPerPage) {
        $query = $this->createQueryBuilder('p')
                ->select('p AS product, COUNT(s.id) AS nbProduct, MIN(s.price) AS minPrice')
                ->leftJoin('p.sale', 's', 'WITH', 's.blocked = 0 AND s.stock > 0')
                ->where('p.state = 1')
                ->andWhere('p.category = :category')
                ->setParameter('category', $category_id)
                ->groupBy('p');

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    /**
     * Obtenir les derniers produits ajouté disponible à la vente
     *
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function findLastProductAdd($page, $nbPerPage) {
        $query = $this->createQueryBuilder('p')
                ->select('p AS product, COUNT(s.id) AS nbProduct, MIN(s.price) AS minPrice')
                ->leftJoin('p.sale', 's', 'WITH', 's.blocked = 0 AND s.stock > 0')
                ->where('p.state = 1')
                ->orderBy('p.date_added', 'DESC')
                ->groupBy('p');

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    /**
     * Obtenir les produits mis en selection
     *
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function findProductInSelection($page, $nbPerPage) {
        $query = $this->createQueryBuilder('p')
                ->select('p AS product, COUNT(s.id) AS nbProduct, MIN(s.price) AS minPrice')
                ->leftJoin('p.sale', 's', 'WITH', 's.blocked = 0 AND s.stock > 0')
                ->where('p.state = 1')
                ->andWhere('p.selected = 1')
                ->groupBy('p');

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);



        return new Paginator($query, true);
    }

    /**
     * Obtenir les produits mis en selection
     *
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function findTopProducts($page, $nbPerPage) {
        $query = $this->createQueryBuilder('p')
                ->select('p AS product, COUNT(sp) AS HIDDEN res, COUNT(s.id) AS nbProduct, MIN(s.price) AS minPrice')
                ->innerJoin('p.sale', 's')
                ->innerJoin('s.salepurchase', 'sp')
                ->groupBy('p')
                ->orderBy('res', 'desc');

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    /**
     * Obtenir les produits en fonction des états de ces derniers
     *
     * @param $status
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function getSheets($status, $page, $nbPerPage) {
        $query = $this->createQueryBuilder('p')
                ->where('p.state = ' . $status);

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    /**
     * Obtenir les produits de la slection
     *
     * @param $page
     * @param $nbPerPage
     * @return Paginator
     */
    public function getSheetsSelected($page, $nbPerPage) {
        $query = $this->createQueryBuilder('p')
                ->where('p.selected = 1');

        $query->setFirstResult(($page - 1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    /**
     * 
     * @param string $status
     * @return integer
     */
    public function countSheets($status = null) {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('count(p)')
                ->from('UlysseBusinessProductBundle:Product', 'p');

        if (null !== $status) {
            $qb->where('p.state = ' . $status);
        }

        return $qb->getQuery()
                        ->getResult();
    }

    public function searchQuery($q)
    {
        $qb = $this->createQueryBuilder('p');

        $qb
            ->select('p AS product, COUNT(s.id) AS nbProduct, MIN(s.price) AS minPrice')
            ->leftJoin('p.sale', 's')
            ->leftJoin('p.tag', 't')
            ->where('p.state = 1')
            ->andWhere($qb->expr()->orX(
                    $qb->expr()->like('p.name', ':q')
                ,
                    $qb->expr()->like('t.wording', ':q')
            ))
            ->setParameter(':q', '%'.$q.'%')
            ->groupBy('p');


        return $qb->getQuery()
                  ->getResult();

    }

}
