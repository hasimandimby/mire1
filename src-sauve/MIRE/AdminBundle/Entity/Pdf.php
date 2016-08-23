<?php

namespace MIRE\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Pdf
 *
 * @ORM\Table(name="mire_pdf")
 * @ORM\Entity(repositoryClass="MIRE\AdminBundle\Repository\PdfRepository")
 */
class Pdf
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=250, nullable=true)
     */
    private $nom;

    /**
     * @Assert\File( maxSize = "3072k", mimeTypesMessage = "Please upload a valid imagefile")
     */
    private $pdffile;
    /**
     * @var string
     *
     * @ORM\Column(name="date_publication", type="string", length=250, nullable=true)
     */
    private $datePublication;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Pdf
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
     * Set datePublication
     *
     * @param string $datePublication
     *
     * @return Pdf
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return string
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }
    /**
     * Set pdffile
     *
     * @param string $pdffile
     *
     * @return Article
     */
    public function setpdffile(UploadedFile $pdffile = null)
    {
        $this->pdffile = $pdffile;

        return $this;
    }

    /**
     * Get pdffile
     *
     * @return string
     */
    public function getpdffile()
    {
        return $this->pdffile;
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
        if (null !== $this->pdffile) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->pdffile = $filename.'.'.$this->pdffile->guessExtension();
        }
    }

    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->pdffile) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->pdffile->move(
            $this->getUploadRootDir(),
            $this->pdffile->getClientOriginalName()
        );
        $this->nom = $this->pdffile->getClientOriginalName();
        // Set the path property to the filename where you've saved the file
        //$this->path = $this->file->getClientOriginalName();

        // Clean up the file property as you won't need it anymore
        $this->pdffile = null;
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->pdffile;
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
        // On retourne le chemin relatif vers l'pdffile pour un navigateur
        return 'uploads/pdf';
    }

    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'pdffile pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

}
