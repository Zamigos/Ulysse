<?php

namespace Ulysse\Core\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('UlysseCoreFrontBundle::index.html.twig');
    }

    public function sideBarMenuAction($route)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('UlysseBusinessProductBundle:Category')->findBy(array('active' => 1));

        return $this->render('UlysseCoreFrontBundle::sideBarMenu.html.twig', array(
            'categories' => $categories,
            'route' => $route
        ));
    }
}