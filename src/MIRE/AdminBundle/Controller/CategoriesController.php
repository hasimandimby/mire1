<?php
/**
 * Created by PhpStorm.
 * User: ando
 * Date: 11/07/2016
 * Time: 01:47
 */

namespace MIRE\AdminBundle\Controller;

use MIRE\AdminBundle\Entity\Categories;
use Symfony\Component\HttpFoundation\Request;

use MIRE\AdminBundle\Form\CategoriesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository("MIREAdminBundle:Categories")->findAll();
        return $this->render('MIREAdminBundle:Categories:index.html.twig',array('categories' => $categories));
    }
    public function addAction(Request $request)
    {
        $categorie = new Categories();
        $form = $this->createForm(CategoriesType::class,$categorie);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'categorie bien enregistrée.');

            return $this->redirect($this->generateUrl('mire_categories_liste'));
        }
        return $this->render('MIREAdminBundle:Categories:add.html.twig', array('form' => $form->createView(),));

    }
    public function updateAction($id , Request $request)
    {
        $categorie = $this->getDoctrine()
            ->getManager()
            ->getRepository('MIREAdminBundle:Categories')
            ->find($id);
        $form = $this->createForm(CategoriesType::class, $categorie);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Categorie bien modifié.');


            return $this->redirect($this->generateUrl('mire_categories_liste'));
        }
        return $this->render('MIREAdminBundle:Categories:update.html.twig', array('form' => $form->createView(),));
    }
    public function deleteAction($id)
    {
        return $this->render('MIREAdminBundle:Categories:delete.html.twig', array('id' => $id ));
    }


}