<?php
/**
 * Created by PhpStorm.
 * User: ando
 * Date: 11/07/2016
 * Time: 01:47
 */

namespace MIRE\AdminBundle\Controller;
use MIRE\AdminBundle\Entity\Pdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MIRE\AdminBundle\Form\PdfType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PdfController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listepdf = $em->getRepository("MIREAdminBundle:Pdf")->findAll();
        return $this->render('MIREAdminBundle:Pdf:index.html.twig',array('listepdf' => $listepdf));
    }
    public function addAction(Request $request)
    {
        $pdf = new Pdf();
        $form = $this->createForm(PdfType::class,$pdf);
        if ($form->handleRequest($request)->isValid()) {
            $pdf->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($pdf);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Pdf enregistré.');

            return $this->redirect($this->generateUrl('mire_pdf_liste'));
        }
        return $this->render('MIREAdminBundle:Pdf:add.html.twig',array('form' =>$form->createView()));
    }
    public function updateAction($id)
    {
        return $this->render('MIREAdminBundle:Pdf:update.html.twig', array('id' => $id ));
    }
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $pdf = $em ->getRepository('MIREAdminBundle:Pdf')
            ->find($id);
        $em->remove($pdf);
        $em->flush();
        return $this->redirect($this->generateUrl('mire_pdf_liste'));
    }


}