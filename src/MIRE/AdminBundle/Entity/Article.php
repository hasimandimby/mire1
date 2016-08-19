<?php

namespace MIRE\AdminBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

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
        $this->auteur = new ArrayCollection();

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
     * @Assert\File( maxSize = "3072k", mimeTypesMessage = "Please upload a valid imagefile")
     */
    private $imagefile;

    /**
     * @var string
     * @ORM\Column(name="image", type="string", length=245, nullable=false)
     */
    private $image;

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @var \Datetime
     * @ORM\Column(name="date", type="datetime", length=250, nullable=true)
     */
    private $date;



    /**
     * @ORM\ManyToMany(targetEntity="Categories", cascade={"persist"})
     */
    private $categories ;

    /**
     * @ORM\ManyToOne(targetEntity="MIRE\AdminBundle\Entity\Auteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

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
     * Get auteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuteur()
    {
        return $this->auteur;
    }




    /**
     * Set imagefile
     *
     * @param string $imagefile
     *
     * @return Article
     */
    public function setimagefile(UploadedFile $imagefile = null)
    {
        $this->imagefile = $imagefile;

        return $this;
    }

    /**
     * Get imagefile
     *
     * @return string
     */
    public function getimagefile()
    {
        return $this->imagefile;
    }

    private $tempFilename;
    /**
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->imagefile) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->imagefile = $filename.'.'.$this->imagefile->guessExtension();
        }
    }

    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->imagefile) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->imagefile->move(
            $this->getUploadRootDir(),
            $this->imagefile->getClientOriginalName()
        );
        $this->image = $this->imagefile->getClientOriginalName();
        // Set the path property to the filename where you've saved the file
        //$this->path = $this->file->getClientOriginalName();

        // Clean up the file property as you won't need it anymore
        $this->imagefile = null;
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->imagefile;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'imagefile pour un navigateur
        return 'uploads/img';
    }

    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'imagefile pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    // …

    /**
     * Add auteur
     *
     * @param \MIRE\AdminBundle\Entity\Auteur $auteur
     *
     * @return Article
     */
    public function addAuteur(\MIRE\AdminBundle\Entity\Auteur $auteur)
    {
        $this->auteur[] = $auteur;

        return $this;
    }

    /**
     * Remove auteur
     *
     * @param \MIRE\AdminBundle\Entity\Auteur $auteur
     */
    public function removeAuteur(\MIRE\AdminBundle\Entity\Auteur $auteur)
    {
        $this->auteur->removeElement($auteur);
    }

    /**
     * Set auteur
     *
     * @param \MIRE\AdminBundle\Entity\Auteur $auteur
     *
     * @return Article
     */
    public function setAuteur(\MIRE\AdminBundle\Entity\Auteur $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }
}
