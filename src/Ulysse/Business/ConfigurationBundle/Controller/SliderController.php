<?php

namespace Ulysse\Business\ConfigurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Slider controller.
 *
 */
class SliderController extends Controller
{

    /**
     * Liste les sliders
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UlysseBusinessConfigurationBundle:Slider')->findAll();

        return $this->render('UlysseBusinessConfigurationBundle:Slider:index.html.twig',
                array('entities' => $entities));
    }
    /**
     * Créé une nouvelle image dans les sliders
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
    
        $formHandler = $this->get('slider_handler');

        if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('slider'));
        }
    
        return $this->render('UlysseBusinessConfigurationBundle:Slider:create.html.twig',
                array('form' => $formHandler->getForm()->createView())
        );
    }

    /**
     * Affiche les détails d'une image du slider
     * 
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws notFoundException si l'entité passée n'éxiste pas
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UlysseBusinessConfigurationBundle:Slider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slider entity.');
        }

        return $this->render('UlysseBusinessConfigurationBundle:Slider:show.html.twig',
                array('entity' => $entity));
    }
    
    /**
     * Edite une image du slider
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction()
    {
        $formHandler = $this->get('slider_handler');

        if ($formHandler->process()) {
            return $this->redirect($this->generateUrl('slider'));
        }

        return $this->render('UlysseBusinessConfigurationBundle:Slider:update.html.twig',
                array('form' => $formHandler->getForm()->createView())
        );
    }
    
    /**
     * Supprime une image du slider
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('UlysseBusinessConfigurationBundle:Slider');

        $data = $repo->find($id);
        $em->remove($data);
        $em->flush();

        return $this->redirect($this->generateUrl('slider'));
    }
    
    /**
     * Affiche le slider coté front
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeSliderAction()
    {
        $em = $this->getDoctrine()->getManager();

        $images = $em->getRepository('UlysseBusinessConfigurationBundle:Slider')->findAll();

        return $this->render('UlysseBusinessConfigurationBundle:Slider:homeSlider.html.twig',
                array('images' => $images));
    }


}
