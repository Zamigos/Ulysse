<?php

namespace Ulysse\Business\PurchaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ulysse\Business\PurchaseBundle\Entity\Purchase;
use Ulysse\Business\PurchaseBundle\Form\PurchaseType;

/**
 * Purchase controller.
 *
 */
class PurchaseBackController extends Controller {

    /**
     * Lists all Purchase entities.
     *
     */
    public function indexAction() {
        return $this->forward('UlysseBusinessPurchaseBundle:PurchaseBack:list');
    }

    public function headerAction() {
        $em = $this->getDoctrine()->getManager();
        $countTotalPurchase = $em->getRepository('UlysseBusinessPurchaseBundle:Purchase')->countTotalPurchase();

        return $this->render('UlysseBusinessPurchaseBundle:Back:header.html.twig', array(
                    'countTotalPurchase' => $countTotalPurchase[0][1]
        ));
    }

    /**
     * Finds and displays a Purchase entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessPurchaseBundle:Purchase')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Purchase entity.');
        }

        $parent = 'UlysseBusinessPurchaseBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        return $this->render('UlysseBusinessPurchaseBundle:Back:show.html.twig', array(
                    'entity' => $entity,
                    'parent' => $parent
        ));
    }

    /**
     * list a Purchase entity.
     *
     */
    public function listAction($mode, $page) {
        $em = $this->getDoctrine()->getManager();
        $nbPerPage = 5;
        switch ($mode) {
            case 'all':
                $entities = $em->getRepository('UlysseBusinessPurchaseBundle:Purchase')->getAllPurchase($page, $nbPerPage);
                $title = 'Toutes les commandes';
                break;
            default:
                break;
        }
        
        $parent = 'UlysseBusinessPurchaseBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        $nbPages = ceil(count($entities) / $nbPerPage);

        return $this->render('UlysseBusinessPurchaseBundle:Back:list.html.twig', array(
                    'entities' => $entities,
                    'parent' => $parent,
                    'title' => $title,
                    'nbPages' => $nbPages,
                    'page' => $page,
                    'mode' => $mode
        ));
    }
}
