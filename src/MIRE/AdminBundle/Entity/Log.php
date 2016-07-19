<?php

namespace MIRE\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="log_telechargement")
 * @ORM\Entity(repositoryClass="MIRE\AdminBundle\Repository\LogRepository")
 */
class Log
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
     * @ORM\Column(name="id_client", type="integer", nullable=true)
     */
    private $idClient;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pdf", type="integer", nullable=true)
     */
    private $idPdf;

    /**
     * @var string
     *
     * @ORM\Column(name="date_telechargement", type="string", length=250, nullable=true)
     */
    private $dateTelechargement;


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
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Log
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set idPdf
     *
     * @param integer $idPdf
     *
     * @return Log
     */
    public function setIdPdf($idPdf)
    {
        $this->idPdf = $idPdf;

        return $this;
    }

    /**
     * Get idPdf
     *
     * @return int
     */
    public function getIdPdf()
    {
        return $this->idPdf;
    }

    /**
     * Set dateTelechargement
     *
     * @param string $dateTelechargement
     *
     * @return Log
     */
    public function setDateTelechargement($dateTelechargement)
    {
        $this->dateTelechargement = $dateTelechargement;

        return $this;
    }

    /**
     * Get dateTelechargement
     *
     * @return string
     */
    public function getDateTelechargement()
    {
        return $this->dateTelechargement;
    }
}

