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
    public function block1Action()
    {
        $em = $this->getDoctrine()->getManager();
        $listearticle =$em->getRepository('MIREAdminBundle:Article')->findByPlace(1);
        $article = new Article();
        if(count($listearticle) > 0)
            $article =$em->getRepository('MIREAdminBundle:Article')->findByPlaceLast(1);

        return $this->render('MIREFrontBundle:Default:block1.html.twig',array('article' => $article,'listearticle' => $listearticle));
    }
    public function block2Action()
    {
        $em = $this->getDoctrine()->getManager();
        $listearticle =$em->getRepository('MIREAdminBundle:Article')->findByPlace(2);

        return $this->render('MIREFrontBundle:Default:block2.html.twig',array('listearticle' => $listearticle));

    }
    public function block13Action()
    {
        $em = $this->getDoctrine()->getManager();
        $listearticle =$em->getRepository('MIREAdminBundle:Article')->findByPlace(13);
        return $this->render('MIREFrontBundle:Default:block13.html.twig',array('listearticles' => $listearticle));
    }
    public function filinfoAction()
    {
        $lastarticle = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Article')->findBy(array(), array('id' => 'DESC'),6);
        return $this->render('MIREFrontBundle:Default:blockfilinfo.html.twig',array('lastarticle' => $lastarticle));
    }
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("MIREAdminBundle:Categories")->findAll();

        return $this->render('MIREFrontBundle:Default:blockmenu.html.twig',array('categories' => $categories));
    }
    public function block3Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock3 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(3);
        $categorieblock3 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>3));
        $articlesblock3big = new Article();
        if(count($articlesblock3) > 0)
        $articlesblock3big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(3);
        return $this->render('MIREFrontBundle:Default:block3.html.twig',array('categorieblock3' => $categorieblock3 ,'articlesblock3' => $articlesblock3 ,'articlesblock3big' =>$articlesblock3big ));
    }
    public function block4Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock4 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(4);
        $categorieblock4 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>4));
        $articlesblock4big = new Article();
        if(count($articlesblock4) > 0)
        $articlesblock4big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(4);
        return $this->render('MIREFrontBundle:Default:block4.html.twig',array('categorieblock4' => $categorieblock4 ,'articlesblock4' => $articlesblock4 ,'articlesblock4big' =>$articlesblock4big ));
    }
    public function block5Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock5 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(5);
        $categorieblock5 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>5));
        return $this->render('MIREFrontBundle:Default:block5.html.twig',array('categorieblock5' => $categorieblock5 ,'articlesblock5' => $articlesblock5 , ));
    } 
    public function block6Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock6 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(6);
        $categorieblock6 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>6));
        $articlesblock6big = new Article();
        if(count($articlesblock6) > 0)
        $articlesblock6big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(6);
        return $this->render('MIREFrontBundle:Default:block6.html.twig',array('categorieblock6' => $categorieblock6 ,'articlesblock6' => $articlesblock6 ,'articlesblock6big' => $articlesblock6big));
    }
    public function block7Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock7 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(7);
        $categorieblock7 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>7));
        $articlesblock7big = new Article();
        if(count($articlesblock7) > 0)
        $articlesblock7big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(7);
        return $this->render('MIREFrontBundle:Default:block7.html.twig',array('categorieblock7' => $categorieblock7 ,'articlesblock7big' => $articlesblock7big,'articlesblock7' => $articlesblock7 ));
    }
    public function block8Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock8 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(8);
        $categorieblock8 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>8));
        $articlesblock8big = new Article();
        if(count($articlesblock8) > 0)
            $articlesblock8big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(8);
        return $this->render('MIREFrontBundle:Default:block8.html.twig',array('categorieblock8' => $categorieblock8 ,'articlesblock8big' => $articlesblock8big ,'articlesblock8' => $articlesblock8));
    }
    public function block9Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock9 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(9);
        $categorieblock9 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>9));
        $articlesblock9big = new Article();

        if(count($articlesblock9) > 0)
        $articlesblock9big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(9);
        return $this->render('MIREFrontBundle:Default:block9.html.twig',array('categorieblock9' => $categorieblock9 ,'articlesblock9' => $articlesblock9,'articlesblock9big' => $articlesblock9big  ));
    }
    public function block10Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock10 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(10);
        $categorieblock10 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>10));
        $articlesblock10big = new Article();
        if(count($articlesblock10) > 0)
        $articlesblock10big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(10);
        return $this->render('MIREFrontBundle:Default:block10.html.twig',array('categorieblock10' => $categorieblock10 ,'articlesblock10' => $articlesblock10 ,'articlesblock10big' => $articlesblock10big ));
    }
    public function block11Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock11 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(11);
        $categorieblock11 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>11));
        $articlesblock11big = new Article();
        if(count($articlesblock11) > 0)
        $articlesblock11big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(11);
        return $this->render('MIREFrontBundle:Default:block11.html.twig',array('categorieblock11' => $categorieblock11 ,'articlesblock11' => $articlesblock11 ,'articlesblock11big' => $articlesblock11big ));
    }
    public function block12Action()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock12 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(12);
        $categorieblock12 = $em->getRepository("MIREAdminBundle:Categories")->findBy(array("place"=>12));
        $articlesblock12big = new Article();
        if(count($articlesblock12) > 0)
        $articlesblock12big = $em->getRepository("MIREAdminBundle:Article")->findByPlaceLast(12);
        return $this->render('MIREFrontBundle:Default:block12.html.twig',array('categorieblock12' => $categorieblock12 ,'articlesblock12' => $articlesblock12,'articlesblock12big' => $articlesblock12big ));
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
        $em = $this->getDoctrine()->getEntityManager();
        $articlesblock13 = $em->getRepository("MIREAdminBundle:Article")->findByPlace(13);
        return $this->render('MIREFrontBundle:Default:proweekend.html.twig',array('articlesblock13'=> $articlesblock13));
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
