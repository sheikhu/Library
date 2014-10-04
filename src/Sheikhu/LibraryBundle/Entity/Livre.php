<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Proxies\__CG__\Sheikhu\LibraryBundle\Entity\Categorie;

/**
 * Livre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sheikhu\LibraryBundle\Entity\LivreRepository")
 */
class Livre
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
     * @var integer
     *
     * @ORM\Column(name="isbn", type="string")
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateParution", type="date")
     */
    private $dateParution;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAcquis", type="date")
     */
    private $dateAcquis;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreDisponible", type="string", unique=true)
     */
    private $nombreDisponible;

    /**
     * @var Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="livres")
     */
    private $categorie;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Exemplaire", mappedBy="livre")
     */
    private $exemplaires;

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
     * Set isbn
     *
     * @param integer $isbn
     * @return Livre
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return integer 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Livre
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
     * Set dateParution
     *
     * @param \DateTime $dateParution
     * @return Livre
     */
    public function setDateParution($dateParution)
    {
        $this->dateParution = $dateParution;

        return $this;
    }

    /**
     * Get dateParution
     *
     * @return \DateTime 
     */
    public function getDateParution()
    {
        return $this->dateParution;
    }

    /**
     * Set dateAcquis
     *
     * @param \DateTime $dateAcquis
     * @return Livre
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
     * Set statut
     *
     * @param string $statut
     * @return Livre
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set nombreDisponible
     *
     * @param integer $nombreDisponible
     * @return Livre
     */
    public function setNombreDisponible($nombreDisponible)
    {
        $this->nombreDisponible = $nombreDisponible;

        return $this;
    }

    /**
     * Get nombreDisponible
     *
     * @return integer 
     */
    public function getNombreDisponible()
    {
        return $this->nombreDisponible;
    }

    /**
     * Set categorie
     *
     * @param Categorie $categorie
     * @return Livre
     */
    public function setCategorie(Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Sheikhu\LibraryBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exemplaires = new ArrayCollection();
    }

    /**
     * Add exemplaires
     *
     * @param \Sheikhu\LibraryBundle\Entity\Exemplaire $exemplaires
     * @return Livre
     */
    public function addExemplaire(Exemplaire $exemplaires)
    {
        $this->exemplaires[] = $exemplaires;
        $exemplaires->setLivre($this);

        return $this;
    }

    /**
     * Remove exemplaires
     *
     * @param \Sheikhu\LibraryBundle\Entity\Exemplaire $exemplaires
     */
    public function removeExemplaire(Exemplaire $exemplaires)
    {
        $this->exemplaires->removeElement($exemplaires);
        $exemplaires->setLivre(null);
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
