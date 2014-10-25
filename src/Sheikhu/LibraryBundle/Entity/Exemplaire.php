<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Exemplaire
 *
 * @ORM\Table(name="exemplaires")
 * @ORM\Entity
 */
class Exemplaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAcquis", type="date")
     */
    private $dateAcquis;

    /**
     * @var integer
     *
     * @ORM\Column(name="cout", type="integer")
     */
    private $cout;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var Livre
     *
     * @ORM\ManyToOne(targetEntity="Livre", inversedBy="exemplaires")
     */
    private $livre;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Pret", mappedBy="exemplaires")
     */
    private $prets;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Exemplaire
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set dateAcquis
     *
     * @param \DateTime $dateAcquis
     * @return Exemplaire
     */
    public function setDateAcquis($dateAcquis)
    {
        $this->dateAcquis = $dateAcquis;

        return $this;
    }

    /**
     * Get dateAcquis
     *
     * @return \DateTime 
     */
    public function getDateAcquis()
    {
        return $this->dateAcquis;
    }

    /**
     * Set cout
     *
     * @param integer $cout
     * @return Exemplaire
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return integer 
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Exemplaire
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set livre
     *
     * @param \Sheikhu\LibraryBundle\Entity\Livre $livre
     * @return Exemplaire
     */
    public function setLivre(Livre $livre = null)
    {
        $this->livre = $livre;
        return $this;
    }

    /**
     * Get livre
     *
     * @return \Sheikhu\LibraryBundle\Entity\Livre 
     */
    public function getLivre()
    {
        return $this->livre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prets = new ArrayCollection();
    }

    /**
     * Add prets
     *
     * @param \Sheikhu\LibraryBundle\Entity\Pret $pret
     * @return Exemplaire
     */
    public function addPret(Pret $pret)
    {
        $this->prets[] = $pret;

        return $this;
    }

    /**
     * Remove prets
     *
     * @param \Sheikhu\LibraryBundle\Entity\Pret $pret
     */
    public function removePret(Pret $pret)
    {
        $this->prets->removeElement($pret);
    }

    /**
     * Get prets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrets()
    {
        return $this->prets;
    }

    public function __toString()
    {
        return $this->livre->getTitre();
    }


}
