<?php

namespace MIRE\FrontBundle\Controller;
use MIRE\AdminBundle\Entity\Categories;
use \MIRE\AdminBundle\Entity\Article;

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
        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository("MIREAdminBundle:Categories")->findAll();

        return $this->render('MIREFrontBundle:Default:blockmenu.html.twig',array('categories' => $categories));
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
        $em = $this->getDoctrine()->getEntityManager();
        //$articlesblock3 = $em->getRepository("MIREAdminBundle:Article")->findAll();
        $articlesblock3 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(3);
        //$articlesblock3 = $em->getRepository("MIREAdminBundle:Article")->testCode();
       // $articlesblock3big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(3);
        $categorieblock3 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>3));

        return $this->render('MIREFrontBundle:Default:block3.html.twig',array('categorieblock3' => $categorieblock3 ,'articlesblock3' => $articlesblock3 , ));
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
    public function gachetteAction()
    {
        return $this->render('MIREFrontBundle:Default:gachette.html.twig');
    }
    public function sidebarAction()
    {
        return $this->render('MIREFrontBundle:Default:sidebar.html.twig');
    }
    public function proweekendAction()
    {
        return $this->render('MIREFrontBundle:Default:proweekend.html.twig');
    }
    public function pubimage2Action()
    {
        return $this->render('MIREFrontBundle:Default:pubimage2.html.twig');
    }
    public function serviceAction()
    {
        return $this->render('MIREFrontBundle:Default:service.html.twig');
    }

}
