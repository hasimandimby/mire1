<?php

namespace MIRE\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MIREFrontBundle:Default:index.html.twig');
    }
}
