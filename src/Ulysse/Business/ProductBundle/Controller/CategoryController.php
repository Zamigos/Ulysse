<?php

namespace Ulysse\Business\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{

    /**
     * Lists all Category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UlysseBusinessProductBundle:Category')->findAll();

        return $this->render('UlysseBusinessProductBundle:Category:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Category entity.
     *
     */
    public function createAction()
    {
    
        $formHandler = $this->get('category_handler');

        if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('category'));
        }

    
        return $this->render('UlysseBusinessProductBundle:Category:create.html.twig',
                             array('form' => $formHandler->getForm()->createView())
        );
    }

    /**
     * Finds and displays a Category entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('UlysseBusinessProductBundle:Category:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
    /**
     * Edits an existing Category entity.
     *
     */
    public function updateAction()
    {
        $formHandler = $this->get('category_handler');

        if ($formHandler->process()) {
            return $this->redirect($this->generateUrl('category'));
        }

        return $this->render('UlysseBusinessProductBundle:Category:update.html.twig',
                             array('form' => $formHandler->getForm()->createView())
        );
    }
    /**
     * Deletes a Category entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessProductBundle:Category');

        $data = $repo->find($id);
        $em->remove($data);
        $em->flush();

        return $this->redirect($this->generateUrl('category'));
    }

    /**
     * Retourne les catégories pour le menu principal
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listCategorieForMenuAction()
    {
        $categories = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('UlysseBusinessProductBundle:Category')
                           ->findBy(array('active' => 1));

        return $this->render('UlysseBusinessProductBundle:Category:menu.html.twig', array('categories' => $categories));
    }
}
