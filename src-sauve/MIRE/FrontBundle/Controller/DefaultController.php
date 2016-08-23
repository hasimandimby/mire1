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
        $em = $this->getDoctrine()->getManager();
        $listearticle =$em->getRepository('MIREAdminBundle:Article')->findByCategorie(1);
        $article = new Article();
        if(count($listearticle) > 0)
            $article =$em->getRepository('MIREAdminBundle:Article')->findByCategorieLast(1);

        return $this->render('MIREFrontBundle:Default:blockalaune.html.twig',array('article' => $article,'listearticle' => $listearticle));
    }
    public function listealauneAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listearticle =$em->getRepository('MIREAdminBundle:Article')->findByCategorie(2);

        return $this->render('MIREFrontBundle:Default:blocklistealaune.html.twig',array('listearticle' => $listearticle));

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
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("MIREAdminBundle:Categories")->findAll();

        return $this->render('MIREFrontBundle:Default:blockmenu.html.twig',array('categories' => $categories));
    }
    public function block1Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock1 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(1);
        $categorieblock1 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>1));
        $articlesblock1big = new Article();
        if(count($articlesblock1) > 0)
        $articlesblock1big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(1);
        return $this->render('MIREFrontBundle:Default:block1.html.twig',array('categorieblock1' => $categorieblock1 ,'articlesblock1' => $articlesblock1 ,'articlesblock1big' =>$articlesblock1big ));
    }
    public function block2Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock2 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(2);
        $categorieblock2 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>2));
        $articlesblock2big = new Article();
        if(count($articlesblock2) > 0)
        $articlesblock2big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(2);
        return $this->render('MIREFrontBundle:Default:block2.html.twig',array('categorieblock2' => $categorieblock2 ,'articlesblock2' => $articlesblock2 ,'articlesblock2big' =>$articlesblock2big ));
    }
    public function block3Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock3 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(3);
        $categorieblock3 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>3));
        return $this->render('MIREFrontBundle:Default:block3.html.twig',array('categorieblock3' => $categorieblock3 ,'articlesblock3' => $articlesblock3 , ));
    } 
    public function block4Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock4 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(4);
        $categorieblock4 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>4));
        $articlesblock4big = new Article();
        if(count($articlesblock4) > 0)
        $articlesblock4big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(4);
        return $this->render('MIREFrontBundle:Default:block4.html.twig',array('categorieblock4' => $categorieblock4 ,'articlesblock4' => $articlesblock4 ,'articlesblock4big' => $articlesblock4big));
    }
    public function block5Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock5 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(5);
        $categorieblock5 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>5));
        $articlesblock5big = new Article();
        if(count($articlesblock5) > 0)
        $articlesblock5big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(5);
        return $this->render('MIREFrontBundle:Default:block5.html.twig',array('categorieblock5' => $categorieblock5 ,'articlesblock5big' => $articlesblock5big,'articlesblock5' => $articlesblock5 ));
    }
    public function block6Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock6 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(6);
        $categorieblock6 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>6));
        $articlesblock6big = new Article();
        if(count($articlesblock6) > 0)
        $articlesblock6big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(6);
        return $this->render('MIREFrontBundle:Default:block6.html.twig',array('categorieblock6' => $categorieblock6 ,'articlesblock6big' => $articlesblock6big ,'articlesblock6' => $articlesblock6));
    }
    public function block7Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock7 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(7);
        $categorieblock7 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>7));
        $articlesblock7big = new Article();

        if(count($articlesblock7) > 0)
        $articlesblock7big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(7);
        return $this->render('MIREFrontBundle:Default:block7.html.twig',array('categorieblock7' => $categorieblock7 ,'articlesblock7' => $articlesblock7,'articlesblock7big' => $articlesblock7big  ));
    }
    public function block8Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock8 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(8);
        $categorieblock8 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>8));
        $articlesblock8big = new Article();
        if(count($articlesblock8) > 0)
        $articlesblock8big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(8);
        return $this->render('MIREFrontBundle:Default:block8.html.twig',array('categorieblock8' => $categorieblock8 ,'articlesblock8' => $articlesblock8 ,'articlesblock8big' => $articlesblock8big ));
    }
    public function block9Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock9 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(9);
        $categorieblock9 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>9));
        $articlesblock9big = new Article();
        if(count($articlesblock9) > 0)
        $articlesblock9big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(9);
        return $this->render('MIREFrontBundle:Default:block9.html.twig',array('categorieblock9' => $categorieblock9 ,'articlesblock9' => $articlesblock9 ,'articlesblock9big' => $articlesblock9big ));
    }
    public function block10Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock10 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(10);
        $categorieblock10 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>10));
        $articlesblock10big = new Article();
        if(count($articlesblock10) > 0)
        $articlesblock10big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(10);
        return $this->render('MIREFrontBundle:Default:block10.html.twig',array('categorieblock10' => $categorieblock10 ,'articlesblock10' => $articlesblock10,'articlesblock10big' => $articlesblock10big ));
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
