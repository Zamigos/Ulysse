<?php

namespace Ulysse\Deployment\DeploymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UlysseDeploymentDeploymentBundle:Default:index.html.twig');
    }
}
