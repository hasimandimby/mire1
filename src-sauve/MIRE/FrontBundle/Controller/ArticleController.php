<?php

namespace MIRE\FrontBundle\Controller;
use MIRE\AdminBundle\Entity\Categories;
use \MIRE\AdminBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction($titre , Request $request)
    {
        $article = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Article')->findBy(array("titre" =>$titre));
        return $this->render('MIREFrontBundle:Article:index.html.twig',array('articles' => $article));
    }
}