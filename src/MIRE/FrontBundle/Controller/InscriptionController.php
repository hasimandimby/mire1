<?php

namespace MIRE\FrontBundle\Controller;
use MIRE\AdminBundle\Entity\Abonemt;
use MIRE\AdminBundle\Entity\Categories;
use \MIRE\AdminBundle\Entity\Article;

use MIRE\AdminBundle\Entity\Client;
use MIRE\FrontBundle\Form\ClientType;
use MIRE\FrontBundle\Form\AbonemtType;
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

            return $this->redirect($this->generateUrl('mire_front_inscription_suite'));
        }
        return $this->render('MIREFrontBundle:inscription:index.html.twig', array('form' => $form->createView(),'client' => $client));
    }
    public function suiteAction(Request $request)
    {

        return $this->render('MIREFrontBundle:inscription:suite.html.twig');
    }
    public function connexionAction(Request $request)
    {
        $client = new Client();
        $p = $request->get('submit');
        $form = $this->createForm(ClientType::Class,$client);
        if (isset($p)) {
            $email =  $request->get('email') ;
            $mdp =  $request->get('password') ;
            $em = $this->getDoctrine()->getManager();
            $client =$em->getRepository('MIREAdminBundle:Client')->findBy(array("email"=>$email,"password" =>$mdp));

            if(count($client)>0)
                return $this->redirect($this->generateUrl('mire_front_inscription_suite'));
            else
                return $this->render('MIREFrontBundle:inscription:index.html.twig', array('form' => $form->createView(),'client' =>$client));

        }
        return $this->render('MIREFrontBundle:inscription:index.html.twig', array('form' => $form->createView(),'client' =>$client));

    }


}