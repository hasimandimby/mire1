<?php

namespace MIRE\FrontBundle\Controller;
use MIRE\AdminBundle\Entity\Categories;
use \MIRE\AdminBundle\Entity\Article;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('MIREFrontBundle:Contact:index.html.twig');
    }
    
}