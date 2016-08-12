<?php
/**
 * Created by PhpStorm.
 * User: ando
 * Date: 11/07/2016
 * Time: 01:47
 */

namespace MIRE\AdminBundle\Controller;

use MIRE\AdminBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Request;
use MIRE\AdminBundle\Form\PageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository("MIREAdminBundle:Page")->findAll();
        return $this->render('MIREAdminBundle:Page:index.html.twig',array('pages'=>$pages));
    }
    public function addAction(Request $request)
    {
        $page = new Page();
        $form = $this->createForm(PageType::Class,$page);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Page bien enregistrée.');

            return $this->redirect($this->generateUrl('mire_page_liste'));
        }
        return $this->render('MIREAdminBundle:Page:add.html.twig', array('form' => $form->createView(),));
    }
    public function updateAction($id)
    {
        return $this->render('MIREAdminBundle:Page:update.html.twig', array('id' => $id ));
    }
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('MIREAdminBundle:Page')->find($id);
        $em->remove($article);
        $em->flush();
        return $this->redirect($this->generateUrl('mire_page_liste'));
    }

}