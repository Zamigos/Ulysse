<?php

namespace Ulysse\Business\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ulysse\Business\ProductBundle\Entity\Product;
use Ulysse\Business\ProductBundle\Form\ProductType;

/**
 * Product controller.
 *
 */
class ProductBackController extends Controller
{

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction()
    {
        return $this->forward('UlysseBusinessProductBundle:ProductBack:list');
    }

    public function headerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $countAllSheets = $em->getRepository('UlysseBusinessProductBundle:Product')->countSheets();
        $countToValidateSheets = $em->getRepository('UlysseBusinessProductBundle:Product')->countSheets(0);
        $countSheetsValidate = $em->getRepository('UlysseBusinessProductBundle:Product')->countSheets(1);
        $countSheetsRefused = $em->getRepository('UlysseBusinessProductBundle:Product')->countSheets(2);

        return $this->render('UlysseBusinessProductBundle:Back:header.html.twig', array(
            'countAllSheets'        => $countAllSheets[0][1],
            'countToValidateSheets' => $countToValidateSheets[0][1],
            'countSheetsValidate'   => $countSheetsValidate[0][1],
            'countSheetsRefused'    => $countSheetsRefused[0][1]
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $parent = 'UlysseBusinessProductBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        return $this->render('UlysseBusinessProductBundle:Back:show.html.twig', array(
            'entity' => $entity,
            'parent' => $parent
        ));
    }

    /**
     * list a Product entity.
     *
     */
    public function listAction($mode = 'untreated', $page = 1)
    {
        $em = $this->getDoctrine()->getManager();
        $nbPerPage = 5;
        switch ($mode) {
            case 'untreated':
                $entities = $em->getRepository('UlysseBusinessProductBundle:Product')->getSheets(0, $page, $nbPerPage);
                $title = 'Fiches non traitées';
                break;
            case 'validated':
                $entities = $em->getRepository('UlysseBusinessProductBundle:Product')->getSheets(1, $page, $nbPerPage);
                $title = 'Fiches validées';
                break;
            case 'refused':
                $entities = $em->getRepository('UlysseBusinessProductBundle:Product')->getSheets(2, $page, $nbPerPage);
                $title = 'Fiches refusées';
                break;
            case 'selected':
                $entities = $em->getRepository('UlysseBusinessProductBundle:Product')->getSheetsSelected($page, $nbPerPage);
                $title = 'Fiches de notre séléction';
                break;
            default:
                break;
        }

        $parent = 'UlysseBusinessProductBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        $nbPages = ceil(count($entities) / $nbPerPage);

        return $this->render('UlysseBusinessProductBundle:Back:list.html.twig', array(
            'entities' => $entities,
            'parent'   => $parent,
            'title'    => $title,
            'nbPages'  => $nbPages,
            'page'     => $page,
            'mode'     => $mode
        ));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }
        $editForm = $this->createEditForm($entity);

        $parent = 'UlysseBusinessProductBundle:Back:index.html.twig';
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $parent = ':ajax:empty.html.twig';
        }

        return $this->render('UlysseBusinessProductBundle:Back:edit.html.twig', array(
            'entity'    => $entity,
            'edit_form' => $editForm->createView(),
            'parent'    => $parent
        ));
    }

    /**
     * Creates a form to edit a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Product $entity)
    {
        $form = $this->createForm(new ProductType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Product entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        $file = $this->getRequest()->request->all();
        if ($editForm->isValid()) {
            $em->flush();

            return $this->forward('UlysseBusinessProductBundle:ProductBack:show', array('id' => $id));
        }
    }

    /**
     * validate a Product entity.
     *
     */
    public function validateAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setState(1);
            $em->persist($entity);
            $em->flush();

            return $this->forward('UlysseBusinessProductBundle:ProductBack:list', array('id' => $id));
        }
    }

    /**
     * refuses a Product entity.
     *
     */
    public function refuseAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setState(2);
            $entity->setSelected(false);
            $em->persist($entity);
            $em->flush();

            return $this->forward('UlysseBusinessProductBundle:ProductBack:list', array('id' => $id));
        }
    }

    /**
     * selected a Product entity.
     *
     */
    public function selectedAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setSelected(true);
            $em->persist($entity);
            $em->flush();

            return $this->forward('UlysseBusinessProductBundle:ProductBack:list', array('id' => $id));
        }
    }

    /**
     * unselected a Product entity.
     *
     */
    public function unselectedAction($id)
    {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('UlysseBusinessProductBundle:Product')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Product entity.');
            }
            $entity->setSelected(false);
            $em->persist($entity);
            $em->flush();

            return $this->forward('UlysseBusinessProductBundle:ProductBack:list', array('id' => $id));
        }
    }

}
