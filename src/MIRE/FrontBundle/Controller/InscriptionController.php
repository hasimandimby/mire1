<?php

namespace MIRE\FrontBundle\Controller;
use MIRE\AdminBundle\Entity\Abonemt;
use MIRE\AdminBundle\Entity\Categories;
use \MIRE\AdminBundle\Entity\Article;

use MIRE\AdminBundle\Entity\Client;
use MIRE\FrontBundle\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InscriptionController extends Controller
{
    public function indexAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::Class,$client);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'bien enregistré.');

            return $this->redirect($this->generateUrl('mire_abonnement_add'));
        }
        return $this->render('MIREFrontBundle:inscription:index.html.twig', array('form' => $form->createView(),));
    }
    public function abonnementAction(Request $request)
    {
        $abonemt = new Abonemt();
        $form = $this->createForm(AbonemtType::Class,$abonemt);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonemt);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'bien enregistré.');

            return $this->redirect($this->generateUrl('mire_abonnement_add'));
        }
        return $this->render('MIREFrontBundle:inscription:index.html.twig', array('form' => $form->createView(),));
    }


}