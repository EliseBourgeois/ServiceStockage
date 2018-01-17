<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Stockage
 *
 * @ORM\Table(name="stockage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StockageRepository")
 * @Vich\Uploadable
 */
class Stockage
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
     * @ORM\Column(name="idUser", type="integer")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=255, unique=true)
     */
    private $fichier;

    /**
     * @var string
     *
     * @ORM\Column(name="tailleFic", type="decimal", precision=10, scale=0)
     */
    private $tailleFic;
    /**
     * @Vich\UploadableField(mapping="stockage", fileNameProperty="stockageName")
     *
     * @var File
     */
    private $stockageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $stockageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Stockage
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $this->getUser()->getId();
        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set fichier
     *
     * @param string $fichier
     *
     * @return Stockage
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set tailleFic
     *
     * @param string $tailleFic
     *
     * @return Stockage
     */
    public function setTailleFic($tailleFic)
    {
        $this->tailleFic = $tailleFic;

        return $this;
    }

    /**
     * Get tailleFic
     *
     * @return string
     */
    public function getTailleFic()
    {
        return $this->tailleFic;
    }
    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $stockage
     *
     * @return Devis
     */
    public function setStockageFile(File $stockage = null)
    {
        $this->stockageFile = $stockage;

        if ($stockage){
            $this->updatedAt = new \DateTimeImmutable();

        }


        return $this;
    }

    /**
     * @return File|null
     */
    public function getStockageFile()
    {
        return $this->stockageFile;
    }

    /**
     * @param string $stockageName
     *
     * @return Stockage
     */
    public function setStockageName($stockageName)
    {
        $this->stockageName = $stockageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStockageName()
    {
        return $this->stockageName;
    }
    /**
     * @return string|null
     */
    public function getStackageName()
    {
        return $this->stockageName;
    }
    /**
     * @return date
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

