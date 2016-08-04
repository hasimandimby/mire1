<?php

namespace MIRE\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MIREFrontBundle:Default:index.html.twig');
    }
    public function launeAction()
    {
        return $this->render('MIREFrontBundle:Default:blockalaune.html.twig');
    }
    public function listealauneAction()
    {
        return $this->render('MIREFrontBundle:Default:blocklistealaune.html.twig');
    }
    public function sliderAction()
    {
        return $this->render('MIREFrontBundle:Default:blockslider.html.twig');
    }
    public function filinfoAction()
    {
        return $this->render('MIREFrontBundle:Default:blockfilinfo.html.twig');
    }
    public function menuAction()
    {
        return $this->render('MIREFrontBundle:Default:blockmenu.html.twig');
    }
    public function block1Action()
    {
        return $this->render('MIREFrontBundle:Default:block1.html.twig');
    }
    public function block2Action()
    {
        return $this->render('MIREFrontBundle:Default:block2.html.twig');
    }
    public function block3Action()
    {
        return $this->render('MIREFrontBundle:Default:block3.html.twig');
    } 
    public function block4Action()
    {
        return $this->render('MIREFrontBundle:Default:block4.html.twig');
    }
    public function block5Action()
    {
        return $this->render('MIREFrontBundle:Default:block5.html.twig');
    }
    public function block6Action()
    {
        return $this->render('MIREFrontBundle:Default:block6.html.twig');
    }
    public function block7Action()
    {
        return $this->render('MIREFrontBundle:Default:block7.html.twig');
    }
    public function block8Action()
    {
        return $this->render('MIREFrontBundle:Default:block8.html.twig');
    }
    public function block9Action()
    {
        return $this->render('MIREFrontBundle:Default:block9.html.twig');
    }
    public function block10Action()
    {
        return $this->render('MIREFrontBundle:Default:block10.html.twig');
    }
}
