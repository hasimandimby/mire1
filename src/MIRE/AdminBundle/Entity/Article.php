<?php

namespace MIRE\AdminBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Article
 *
 * @ORM\Table(name="mire_articles")
 * @ORM\Entity(repositoryClass="MIRE\AdminBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * Constructor
     */
    public function __construct()
    {

        $this->date         = new \Datetime();
        $this->categories = new ArrayCollection();

    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = true;
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=250, nullable=true)
     */
    private $titre;

    /**
     * @var string
     * @Assert\File( maxSize = "3072k", mimeTypesMessage = "Please upload a valid Image")
     * @ORM\Column(name="image", type="string", length=245, nullable=false)
     */
    private $image;
hh
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="id_auteur", type="integer", nullable=true)
     */
    private $idAuteur;

    /**
     * @ORM\ManyToMany(targetEntity="Categories", cascade={"persist"})
     */
    private $categories ;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text",nullable=true)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="motcle", type="text", nullable=true)
     */
    private $motcle;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idAuteur
     *
     * @param integer $idAuteur
     *
     * @return Article
     */
    public function setIdAuteur($idAuteur)
    {
        $this->idAuteur = $idAuteur;

        return $this;
    }

    /**
     * Get idAuteur
     *
     * @return int
     */
    public function getIdAuteur()
    {
        return $this->idAuteur;
    }


    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set motcle
     *
     * @param string $motcle
     *
     * @return Article
     */
    public function setMotcle($motcle)
    {
        $this->motcle = $motcle;

        return $this;
    }

    /**
     * Get motcle
     *
     * @return string
     */
    public function getMotcle()
    {
        return $this->motcle;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Article
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }


    /**
     * Add category
     *
     * @param \MIRE\AdminBundle\Entity\Categories $category
     *
     * @return Article
     */
    public function addCategory(\MIRE\AdminBundle\Entity\Categories $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \MIRE\AdminBundle\Entity\categories $category
     */
    public function removeCategory(\MIRE\AdminBundle\Entity\Categories $category)
    {
        $this->categories->removeElement($category);
    }


    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Article
     */
    public function setImage(UploadedFile $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
