<?php

namespace MIRE\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="mire_categories")
 * @ORM\Entity(repositoryClass="MIRE\AdminBundle\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer", length=255,nullable=true)
     */
    private $ordre;
    /**
     * @var int
     *
     * @ORM\Column(name="place", type="integer", length=255,nullable=true)
     */
    private $place;

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Article", cascade={"persist"})
     */
    private $articles ;

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=250, nullable=true)
     */
    private $nom;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set ordre
     *
     * @param string $ordre
     *
     * @return Categories
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    /**
     * Get ordre
     *
     * @return string
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Categories
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add article
     *
     * @param \MIRE\AdminBundle\Entity\Article $article
     *
     * @return Categories
     */
    public function addArticle(\MIRE\AdminBundle\Entity\Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \MIRE\AdminBundle\Entity\Article $article
     */
    public function removeArticle(\MIRE\AdminBundle\Entity\Article $article)
    {
        $this->articles->removeElement($article);
    }
}
