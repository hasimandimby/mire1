<?php
/**
 * Created by PhpStorm.
 * User: ando
 * Date: 11/07/2016
 * Time: 01:47
 */

namespace MIRE\AdminBundle\Controller;

use MIRE\AdminBundle\Entity\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PdfController extends Controller
{
    public function indexAction()
    {
        return $this->render('MIREAdminBundle:Pdf:index.html.twig');
    }
    public function addAction()
    {
        return $this->render('MIREAdminBundle:Pdf:add.html.twig');
    }
    public function updateAction($id)
    {
        return $this->render('MIREAdminBundle:Pdf:update.html.twig', array('id' => $id ));
    }
    public function deleteAction($id)
    {
        return $this->render('MIREAdminBundle:Pdf:delete.html.twig', array('id' => $id ));
    }


}