<?php

namespace MIRE\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MIREAdminBundle:Default:index.html.twig');
    }
}
