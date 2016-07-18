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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    public function indexAction()
    {
        return $this->render('MIREAdminBundle:Article:index.html.twig');
    }
    public function addAction(Request $request)
    {

        // Création de l'entité
        $article = new Article;
        $article->setTitre("Euro 2016 :Victoire de Portuhal face à la france");
        $article->setIdAuteur('2');
        $article->setContenu("Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…");
        $categorie = new Categories();
        $categorie->setNom("test");
        $article->addCategory($categorie);
        $article->setMotcle("Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…");
        // On peut ne pas définir ni la date ni la publication,
        // car ces attributs sont définis automatiquement dans le constructeur
        // Création de l'entité Image
        $image = new Image();
        $image->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
        $image->setAlt('Job de rêve');

        // On lie l'image à l'annonce
        $article->setImage($image);

        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Étape 1 : On « persiste » l'entité
        $em->persist($article);

        // Étape 1 bis : si on n'avait pas défini le cascade={"persist"},
        // on devrait persister à la main l'entité $image
        // $em->persist($image);

        // Étape 2 : On déclenche l'enregistrement
        $em->flush();
        // On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();

        // Étape 1 : On « persiste » l'entité
        $em->persist($article);
        $article2 = $em->getRepository('MIREAdminBundle:Article')->find(1);

// On modifie cette annonce, en changeant la date à la date d'aujourd'hui
        $article2->setDate(new \Datetime());
        // Étape 2 : On « flush » tout ce qui a été persisté avant
        $em->flush();

        // Reste de la méthode qu'on avait déjà écrit
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            return $this->redirect($this->generateUrl('mire_admin_article', array('id' => $article->getId())));
        }

        return $this->render('MIREAdminBundle:Article:add.html.twig');

    }
    public function updateAction($id , Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // On récupère l'article $id
        $article = $em->getRepository('MIREAdminBundle:Article')->find($id);

        if (null === $article) {
            throw new NotFoundHttpException("L'article d'id " . $id . " n'existe pas.");
        }

        // La méthode findAll retourne toutes les catégories de la base de données
        $listCategories = $em->getRepository('MIREAdminBundle:Categories')->findAll();

        // On boucle sur les catégories pour les lier à l'article
        foreach ($listCategories as $category) {
            $article->addCategory($category);
        }

        // Pour persister le changement dans la relation, il faut persister l'entité propriétaire
        // Ici, Advert est le propriétaire, donc inutile de la persister car on l'a récupérée depuis Doctrine

        // Étape 2 : On déclenche l'enregistrement
        $em->flush();

        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            return $this->redirect($this->generateUrl('mire_admin_article', array('id' => $article->getId())));
        }
    }
    public function deleteAction($id)
    {
        return $this->render('MIREAdminBundle:Article:delete.html.twig', array('id' => $id ));
    }

    
}