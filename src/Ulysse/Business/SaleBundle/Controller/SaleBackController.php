<?php

namespace Ulysse\Business\SaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ulysse\Business\SaleBundle\Entity\Sale;
use Ulysse\Business\SaleBundle\Form\SaleType;

/**
 * Sale controller.
 *
 */
class SaleBackController extends Controller
{

    /**
     * Lists all Sale entities.
     *
     */
    public function indexAction()
    {
        return $this->forward('UlysseBusinessSaleBundle:SaleBack:list');
    }
    
    public function headerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $countPendingSale = $em->getRepository('UlysseBusinessSaleBundle:Sale')->countPendingSale();
        $countFinishedSale = $em->getRepository('UlysseBusinessSaleBundle:Sale')->countFinishedSale();
        $countAllSale = $em->getRepository('UlysseBusinessSaleBundle:Sale')->countSale();
        $countBlockedSale = $em->getRepository('UlysseBusinessSaleBundle:Sale')->countBlockedSale();

        return $this->render('UlysseBusinessSaleBundle:Back:header.html.twig', array(
                    'countPendingSale' => $countPendingSale[0][1],
                    'countFinishedSale' => $countFinishedSale[0][1],
                    'countAllSale' => $countAllSale[0][1],
                    'countBlockedSale' => $countBlockedSale[0][1],
        ));
    }

    /**
     * Finds and displays a Sale entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sale entity.');
        }

        $parent = 'UlysseBusinessSaleBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        return $this->render('UlysseBusinessSaleBundle:Back:show.html.twig', array(
                    'entity' => $entity,
                    'parent' => $parent
        ));
    }

    /**
     * list a Sale entity.
     *
     */
    public function listAction($mode = 'all', $page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        $nbPerPage = 5;
        switch ($mode) {
            case 'all':
                $entities = $em->getRepository('UlysseBusinessSaleBundle:Sale')->getSales($page, $nbPerPage);
                $title = 'Toutes les produits en vente';
                break;
            case 'pending':
                $entities = $em->getRepository('UlysseBusinessSaleBundle:Sale')->getPendingSales($page, $nbPerPage);
                $title = 'Ventes en cours';
                break;
            case 'finished':
                $entities = $em->getRepository('UlysseBusinessSaleBundle:Sale')->getFinishedSales($page, $nbPerPage);
                $title = 'Ventes terminées';
                break;
            case 'blocked':
                $entities = $em->getRepository('UlysseBusinessSaleBundle:Sale')->getBlockedSales($page, $nbPerPage);
                $title = 'Ventes bloquées';
                break;
            default:
                break;
        }

        $parent = 'UlysseBusinessSaleBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        $nbPages = ceil(count($entities) / $nbPerPage);

        return $this->render('UlysseBusinessSaleBundle:Back:list.html.twig', array(
                    'entities' => $entities,
                    'parent' => $parent,
                    'title' => $title,
                    'nbPages' => $nbPages,
                    'page' => $page,
                    'mode' => $mode
        ));
    }

    /**
     * Displays a form to edit an existing Sale entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sale entity.');
        }
        $editForm = $this->createEditForm($entity);

        $parent = 'UlysseBusinessSaleBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        return $this->render('UlysseBusinessSaleBundle:Back:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'parent' => $parent
        ));
    }

    /**
     * Displays a form to create a new Sale entity.
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction()
    {
        $entity = new Sale();
        $form = $this->createCreateForm($entity);

        return $this->render('UlysseBusinessSaleBundle:Sale:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to edit a Sale entity.
     *
     * @param Sale $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Sale $entity)
    {
        $form = $this->createForm(new SaleType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Sale entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sale entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->forward('UlysseBusinessSaleBundle:SaleBack:show', array('id' => $id));
        }
    }

    /**
     * validate a Sale entity.
     *
     */
    public function validateAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sale entity.');
            }
            $entity->setState(1);
            $em->persist($entity);
            $em->flush();

            return $this->forward('UlysseBusinessSaleBundle:SaleBack:list');
        }
    }

    /**
     * refuses a Sale entity.
     *
     */
    public function refuseAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sale entity.');
            }
            $entity->setState(2);
            $em->persist($entity);
            $em->flush();

            return $this->forward('UlysseBusinessSaleBundle:SaleBack:list');
        }
    }

    /**
     * Locked a User entity.
     *
     */
    public function blockAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setBlocked(true);
            $em->persist($entity);
            $em->flush();
        }

        return $this->forward('UlysseBusinessSaleBundle:SaleBack:list');
    }

    /**
     * Unblock a User entity.
     *
     */
    public function unblockAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessSaleBundle:Sale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setBlocked(false);
            $em->persist($entity);
            $em->flush();
        }

        return $this->forward('UlysseBusinessSaleBundle:SaleBack:list');
    }

}
