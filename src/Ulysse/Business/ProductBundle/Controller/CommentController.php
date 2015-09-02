<?php

namespace Ulysse\Business\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ulysse\Business\ProductBundle\Entity\Comment;
use Ulysse\Business\ProductBundle\Form\CommentType;

/**
 * Comment controller.
 *
 */
class CommentController extends Controller
{

    /**
     * Lists all Comment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UlysseBusinessProductBundle:Comment')->findAll();

        return $this->render('UlysseBusinessProductBundle:Comment:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Comment entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Comment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('comment_show', array('id' => $entity->getId())));
        }

        return $this->render('UlysseBusinessProductBundle:Comment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Comment entity.
     *
     * @param Comment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Comment $entity)
    {
        $form = $this->createForm(new CommentType(), $entity, array(
            'action' => $this->generateUrl('comment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Comment entity.
     *
     */
    public function newAction()
    {
        $entity = new Comment();
        $form   = $this->createCreateForm($entity);

        return $this->render('UlysseBusinessProductBundle:Comment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comment entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UlysseBusinessProductBundle:Comment:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comment entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UlysseBusinessProductBundle:Comment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Comment entity.
    *
    * @param Comment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Comment $entity)
    {
        $form = $this->createForm(new CommentType(), $entity, array(
            'action' => $this->generateUrl('comment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Comment entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessProductBundle:Comment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('comment_edit', array('id' => $id)));
        }

        return $this->render('UlysseBusinessProductBundle:Comment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Comment entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UlysseBusinessProductBundle:Comment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('comment'));
    }

    /**
     * Creates a form to delete a Comment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
