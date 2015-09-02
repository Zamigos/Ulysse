<?php

namespace Ulysse\Business\ConfigurationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConfigurationController extends Controller {
    
    /**
     * Vérifie si le déploiement a eu lieu
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function checkDeploymentAction() {
        try {
            $em = $this->getDoctrine()->getManager();
            $rep = $em->getRepository('UlysseBusinessConfigurationBundle:Configuration');
            $configuration = $rep->find(1);
            $redirect = false;
            if (!$configuration || !$configuration->getDeployed()) {
                $redirect = true;
            }
        } catch (\Exception $ex) {
            $redirect = true;
        }
        return $this->render('UlysseBusinessConfigurationBundle:Configuration:redirect.html.twig',
                array('redirect' => $redirect));
    }
    
    /**
     * Récupère le logo pour l'afficher coté front
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getLogoAction() {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('UlysseBusinessConfigurationBundle:Configuration');
        $configuration = $rep->find(1);
        
        return $this->render('UlysseBusinessConfigurationBundle:Configuration:logo.html.twig',
                array('configuration' => $configuration));
    }
    
    /**
     * Récupère la configuration pour afficher le nom de l'entreprise et les
     * mentions légales dans le footer
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getFooterAction() {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('UlysseBusinessConfigurationBundle:Configuration');
        $configuration = $rep->find(1);
        
        return $this->render('UlysseBusinessConfigurationBundle:Configuration:footer.html.twig',
                array('configuration' => $configuration));
    }
    
    /**
     * Met à jour les paramètres de configuration
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction() {
        $this->getRequest()->request->set('id', 1);
        
        $formHandler = $this->get('configuration_handler');
        
        if ($formHandler->process()) {
            return $this->redirect($this->generateUrl('configuration'));
        }
        
        $configuration = $this->getDoctrine()->getManager()->getRepository('UlysseBusinessConfigurationBundle:Configuration')->find(1);
        return $this->render('UlysseBusinessConfigurationBundle:Configuration:update.html.twig',
                array(
                    'form' => $formHandler->getForm()->createView(),
                    'configuration' => $configuration
                ));
    }

}
