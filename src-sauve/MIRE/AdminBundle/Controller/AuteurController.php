<?php
/**
 * Created by PhpStorm.
 * User: ando
 * Date: 11/07/2016
 * Time: 01:47
 */

namespace MIRE\AdminBundle\Controller;

use MIRE\AdminBundle\Entity\Auteur;
use MIRE\AdminBundle\Form\AuteurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuteurController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $auteur = $em->getRepository("MIREAdminBundle:Auteur")->findAll();
        return $this->render('MIREAdminBundle:Auteur:index.html.twig',array('auteur' => $auteur));
    }
    public function listeAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $auteur = $em->getRepository("MIREAdminBundle:Auteur")->findAll();
        return $this->render('MIREAdminBundle:Auteur:liste.html.twig',array('auteur' => $auteur));
    }



    public function addAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class,$auteur);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'auteur bien enregistrée.');

            return $this->redirect($this->generateUrl('mire_auteur_liste'));
        }
        return $this->render('MIREAdminBundle:Auteur:add.html.twig', array('form' => $form->createView(),));
    }

    public function updateAction($id , Request $request)
    {
        $auteur = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Auteur')
            ->find($id);
        $form = $this->createForm(AuteurType::class, $auteur);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($auteur);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Auteur bien modifié.');


            return $this->redirect($this->generateUrl('mire_auteur_liste'));
        }
        return $this->render('MIREAdminBundle:Auteur:update.html.twig', array('form' => $form->createView(),));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $auteur = $em ->getRepository('MIREAdminBundle:Auteur')
            ->find($id);
        $em->remove($auteur);
        $em->flush();
        return $this->redirect($this->generateUrl('mire_auteur_liste'));
    }


}