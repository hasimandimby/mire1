<?php
/**
 * Created by PhpStorm.
 * User: ando
 * Date: 11/07/2016
 * Time: 01:47
 */

namespace MIRE\AdminBundle\Controller;
use MIRE\AdminBundle\Entity\Article;
use MIRE\AdminBundle\Entity\Image;
use MIRE\AdminBundle\Entity\Categories;
use MIRE\AdminBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
class ArticleController extends Controller
{
    public function indexAction()
    {
        return $this->render('MIREAdminBundle:Article:index.html.twig');
    }
    public function addAction(Request $request)
    {

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        if ($form->handleRequest($request)->isValid()) {
            $article->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Article bien enregistrée.');

            return $this->redirect($this->generateUrl('mire_article_liste'));
        }

        return $this->render('MIREAdminBundle:Article:add.html.twig', array('form' => $form->createView(),));
        }



    public function updateAction($id , Request $request)
    {
            $article = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Article')
            ->find($id);
             $form = $this->createForm(ArticleType::class, $article);

              if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Article bien modifié.');


            return $this->redirect($this->generateUrl('mire_article_update', array('id' => $article->getId())));
        }

        return $this->render('MIREAdminBundle:Article:update.html.twig', array('form' => $form->createView(),));

    }
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $article = $em ->getRepository('MIREAdminBundle:Article')
            ->find($id);
        $em->remove($article);
        $em->flush();
        return $this->redirect($this->generateUrl('mire_article_liste'));

    }
    public function listeAction()
    {
        $articles = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Article')
            ->findAll();


            return $this->render('MIREAdminBundle:Article:liste.html.twig',array('articles' => $articles));
    }
}