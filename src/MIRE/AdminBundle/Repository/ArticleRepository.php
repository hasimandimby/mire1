<?php

namespace MIRE\AdminBundle\Repository;
use MIRE\AdminBundle\Entity\Article;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByCategorie($categorie_id)
    {
        $a = new Article();
        $query  = $this->_em->createQuery('SELECT a FROM Article a JOIN a.Categories c WHERE c.id = :id');
        $query->setParameter('id',$categorie_id);
        return $query->getResult();
    }
    public function findByPlace($place_num)
    {
        $query  = $this->_em->createQuery('SELECT a FROM Article a JOIN a.Categories c WHERE c.place = :place');
        $query->setParameter('place',$place_num);
        return $query->getResult();
    }
}
