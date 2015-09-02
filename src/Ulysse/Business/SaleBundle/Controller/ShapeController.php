<?php

namespace Ulysse\Business\SaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ulysse\Business\SaleBundle\Entity\Shape;

/**
 * Shape controller.
 *
 */
class ShapeController extends Controller
{

    /**
     * Lists all Shape entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UlysseBusinessSaleBundle:Shape')->findAll();

        return $this->render('UlysseBusinessSaleBundle:Shape:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Shape entity.
     *
     */
    public function createAction()
    {
    
        $formHandler = $this->get('shape_handler');

        if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('shape'));
        }

    
        return $this->render('UlysseBusinessSaleBundle:Shape:create.html.twig',
                             array('form' => $formHandler->getForm()->createView())
        );
    }

    /**
     * Finds and displays a Shape entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessSaleBundle:Shape')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shape entity.');
        }

        return $this->render('UlysseBusinessSaleBundle:Shape:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
    /**
     * Edits an existing Shape entity.
     *
     */
    public function updateAction()
    {
        $formHandler = $this->get('shape_handler');

        if ($formHandler->process()) {
            return $this->redirect($this->generateUrl('shape'));
        }

        return $this->render('UlysseBusinessSaleBundle:Shape:update.html.twig',
                             array('form' => $formHandler->getForm()->createView())
        );
    }
    /**
     * Deletes a Shape entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessSaleBundle:Shape');

        $data = $repo->find($id);
        $em->remove($data);
        $em->flush();

        return $this->redirect($this->generateUrl('shape'));
    }
}
