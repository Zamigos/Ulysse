<?php
/**
 * Created by PhpStorm.
 * User: ulysse
 * Date: 27/07/15
 * Time: 14:48
 */

namespace Ulysse\Business\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class SearchController extends Controller
{

    /**
     * Recherche d'un produit par tag ou par son title
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchAction(Request $request)
    {
        $q = $request->query->get('q');

        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('UlysseBusinessProductBundle:Product')->searchQuery($q);


        return $this->render('UlysseBusinessProductBundle:Search:searchResult.html.twig', array(
            'products' => $products
        ));
    }

}