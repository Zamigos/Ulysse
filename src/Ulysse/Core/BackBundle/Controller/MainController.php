<?php

namespace Ulysse\Core\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller {

    public function indexAction() {
        return $this->render('UlysseCoreBackBundle:Main:index.html.twig',
                array('stats' => $this->getStatistiques()));
    }
    
    public function getStatistiques() {
        return $this->getDoctrine()
                ->getManager()
                ->getRepository('UlysseBusinessPurchaseBundle:Purchase')
                ->countPurchasePerMonth();
    }

    public function getMenus() {
        return array(
            array(
                'path' => 'ulysse_back_homepage',
                'name' => 'Dashboard',
                'icon' => 'fa fa-dashboard',
                'role' => 'ROLE_ADMIN'
            ),
            array(
                'path' => 'support_list_back',
                'name' => 'Support',
                'icon' => 'fa fa-comments',
                'role' => 'ROLE_ADMIN_SUPPORT'
            ),
            array(
                'path' => 'purchase_list_back',
                'name' => 'Commandes',
                'icon' => 'fa fa-globe',
                'role' => 'ROLE_ADMIN_SUPPORT'
            ),
            array(
                'path' => 'sale_list_back',
                'name' => 'Produits en ventes',
                'icon' => 'fa fa-shopping-cart',
                'role' => 'ROLE_ADMIN_SUPPORT'
            ),
            array(
                'path' => 'product_back',
                'name' => 'Fiches produit',
                'icon' => 'fa fa-file-powerpoint-o',
                'role' => 'ROLE_ADMIN'
            ),
            array(
                'path' => 'user_list_back',
                'name' => 'Utilisateurs',
                'icon' => 'fa fa-user',
                'role' => 'ROLE_ADMIN_SUPPORT'
            ),
            array(
                'path' => '',
                'name' => 'Gestion des données',
                'icon' => 'fa fa-database',
                'role' => 'ROLE_ADMIN_SUPPORT'
            ),
            array(
                'path' => 'configuration',
                'name' => 'Paramètres de gestion',
                'icon' => 'fa fa-cog',
                'role' => 'ROLE_SUPER_ADMIN'
            ),
            array(
                'path' => 'slider',
                'name' => 'Slider',
                'icon' => 'fa fa-picture-o',
                'role' => 'ROLE_SUPER_ADMIN'
            )
        );
    }

    public function menuAction() {
        $menus = $this->getMenus();

        $routeName = $this->container->get('request');

        $submenus = array(
            array('parent' => 'Gestion des données', 'path' => 'category', 'name' => 'Catégories'),
            array('parent' => 'Gestion des données', 'path' => 'tag', 'name' => 'Tags'),
            array('parent' => 'Gestion des données', 'path' => 'shape', 'name' => 'Etats')
        );

        return $this->render('UlysseCoreBackBundle:Main:menu.html.twig', array(
                    'menus' => $menus,
                    'submenus' => $submenus,
                    'routeName' => $routeName
        ));
    }

    public function rubriqueAction() {
        $rubriques = array(
            array('path' => 'ulysse_back_homepage', 'name' => 'Achats', 'class' => 'bg-yellow'),
            array('path' => 'support_list_back', 'name' => 'Tickets non lues', 'class' => 'bg-aqua'),
            array('path' => 'product_back', 'name' => 'Produits à valider', 'class' => 'bg-green'),
            array('path' => 'ulysse_back_homepage', 'name' => 'Utilisateurs', 'class' => 'bg-red')
        );

        return $this->render('UlysseCoreBackBundle:Main:rubrique.html.twig', array(
                    'rubriques' => $rubriques
        ));
    }

    public function headerAction() {
        $em = $this->getDoctrine()->getManager();
        $countUnanswerable = $em->getRepository('UlysseBusinessSupportBundle:Ticket')->countNotSeenTickets();

        return $this->render('UlysseCoreBackBundle:Main:header.html.twig', array(
                    'countMessages' => $countUnanswerable[0][1]
        ));
    }

}
