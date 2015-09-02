<?php

namespace Ulysse\Business\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ulysse\Business\ProductBundle\Entity\Tag;

/**
 * Tag controller.
 *
 */
class TagController extends Controller
{

    /**
     * Lists all Tag entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UlysseBusinessProductBundle:Tag')->findAll();

        return $this->render('UlysseBusinessProductBundle:Tag:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Tag entity.
     *
     */
    public function createAction()
    {
        $formHandler = $this->get('tag_handler');

        if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('tag'));
        }
    
        return $this->render('UlysseBusinessProductBundle:Tag:create.html.twig',
                             array('form' => $formHandler->getForm()->createView())
        );
    }

    /**
     * Finds and displays a Tag entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Tag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tag entity.');
        }

        return $this->render('UlysseBusinessProductBundle:Tag:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
    /**
     * Edits an existing Tag entity.
     *
     */
    public function updateAction()
    {
        $formHandler = $this->get('tag_handler');

        if ($formHandler->process()) {
            return $this->redirect($this->generateUrl('tag'));
        }

        return $this->render('UlysseBusinessProductBundle:Tag:update.html.twig',
                             array('form' => $formHandler->getForm()->createView())
        );
    }
    /**
     * Deletes a Tag entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessProductBundle:Tag');

        $data = $repo->find($id);
        $em->remove($data);
        $em->flush();

        return $this->redirect($this->generateUrl('tag'));
    }
}
