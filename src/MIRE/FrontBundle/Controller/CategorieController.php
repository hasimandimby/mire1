<?php

namespace MIRE\FrontBundle\Controller;
use MIRE\AdminBundle\Entity\Categories;
use \MIRE\AdminBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function indexAction($nom ,Request $request)
    {
        $categorie = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Categories')->findOneBy(array("nom" =>$nom));
        $articles = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Article')->findByCategorie($categorie->getId());
        $article = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Article')->findByCategorieLast($categorie->getId());
        return $this->render('MIREFrontBundle:Categorie:index.html.twig',array('articles' => $articles , 'article'=> $article));
    }
}