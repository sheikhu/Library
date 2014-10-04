<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pret
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pret
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
     * @var \DateTime
     *
     * @ORM\Column(name="datePret", type="datetime")
     */
    private $datePret;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetourPrevue", type="datetime")
     */
    private $dateRetourPrevue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetour", type="datetime")
     */
    private $dateRetour;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Exemplaire", inversedBy="prets")
     */
    private $exemplaires;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exemplaires = new ArrayCollection();
    }

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
     * Set datePret
     *
     * @param \DateTime $datePret
     * @return Pret
     */
    public function setDatePret($datePret)
    {
        $this->datePret = $datePret;

        return $this;
    }

    /**
     * Get datePret
     *
     * @return \DateTime 
     */
    public function getDatePret()
    {
        return $this->datePret;
    }

    /**
     * Set dateRetourPrevue
     *
     * @param \DateTime $dateRetourPrevue
     * @return Pret
     */
    public function setDateRetourPrevue($dateRetourPrevue)
    {
        $this->dateRetourPrevue = $dateRetourPrevue;

        return $this;
    }

    /**
     * Get dateRetourPrevue
     *
     * @return \DateTime 
     */
    public function getDateRetourPrevue()
    {
        return $this->dateRetourPrevue;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     * @return Pret
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime 
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Pret
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
     * Add exemplaires
     *
     * @param \Sheikhu\LibraryBundle\Entity\Exemplaire $exemplaire
     * @return Pret
     */
    public function addExemplaire(Exemplaire $exemplaire)
    {
        $this->exemplaires[] = $exemplaire;

        return $this;
    }

    /**
     * Remove exemplaires
     *
     * @param \Sheikhu\LibraryBundle\Entity\Exemplaire $exemplaires
     */
    public function removeExemplaire(\Sheikhu\LibraryBundle\Entity\Exemplaire $exemplaires)
    {
        $this->exemplaires->removeElement($exemplaires);
    }

    /**
     * Get exemplaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExemplaires()
    {
        return $this->exemplaires;
    }
}
