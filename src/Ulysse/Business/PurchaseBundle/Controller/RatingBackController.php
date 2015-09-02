<?php

namespace Ulysse\Business\PurchaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Rating controller.
 *
 */
class RatingBackController extends Controller {
    
    /**
     * list a Rating entity.
     *
     */
    public function listAction($sale) {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('UlysseBusinessPurchaseBundle:Rating')->findRatingBySale($sale);

        return $this->render('UlysseBusinessPurchaseBundle:Back:ratings.html.twig', array(
                    'entities' => $entities
        ));
    }

    /**
     * Moderate a Rating entity.
     *
     */
    public function moderateAction($idRating, $idSale)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessPurchaseBundle:Rating')->find($idRating);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setModerate(true);
            $em->persist($entity);
            $em->flush();
        }

        return $this->forward('UlysseBusinessSaleBundle:SaleBack:show', array('id' => $idSale));
    }

}
