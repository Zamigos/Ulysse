<?php

namespace Ulysse\Business\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserFrontController extends Controller
{
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UlysseBusinessUserBundle:User')->find($id);
        $ratings = $em->getRepository('UlysseBusinessPurchaseBundle:Rating')->findBy(array('user' => $user), array('id' => 'DESC'));

        return $this->render('UlysseBusinessUserBundle:User:show.html.twig', array(
            'user' => $user,
            'ratings' => $ratings
        ));

    }
}
