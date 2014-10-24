<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Livre
 *
 * @ORM\Table(name="livres")
 * @ORM\Entity(repositoryClass="Sheikhu\LibraryBundle\Entity\LivreRepository")
 */
class Livre
{

    use ORMBehaviors\Timestampable\Timestampable;

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
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $synopsis;
    
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
     * @ORM\Column(name="nombreDisponible", type="integer", unique=true)
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
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Auteur", mappedBy="livres")
     */
    private $auteurs;

    /**
     * @var MaisonEdition
     *
     * @ORM\ManyToOne(targetEntity="MaisonEdition", inversedBy="livres")
     */
    private $maisonEdition;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exemplaires = new ArrayCollection();
        $this->auteurs = new ArrayCollection();
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

    /**
     * Add auteurs
     *
     * @param \Sheikhu\LibraryBundle\Entity\Auteur $auteur
     * @return Livre
     */
    public function addAuteur(Auteur $auteur)
    {
        $this->auteurs[] = $auteur;

        return $this;
    }

    /**
     * Remove auteurs
     *
     * @param \Sheikhu\LibraryBundle\Entity\Auteur $auteurs
     */
    public function removeAuteur(\Sheikhu\LibraryBundle\Entity\Auteur $auteurs)
    {
        $this->auteurs->removeElement($auteurs);
    }

    /**
     * Get auteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuteurs()
    {
        return $this->auteurs;
    }

    /**
     * Set maisonEdition
     *
     * @param \Sheikhu\LibraryBundle\Entity\MaisonEdition $maisonEdition
     * @return Livre
     */
    public function setMaisonEdition(MaisonEdition $maisonEdition = null)
    {
        $this->maisonEdition = $maisonEdition;

        return $this;
    }

    /**
     * Get maisonEdition
     *
     * @return \Sheikhu\LibraryBundle\Entity\MaisonEdition 
     */
    public function getMaisonEdition()
    {
        return $this->maisonEdition;
    }

    /**
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     *
     * @return Livre
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
        return $this;
    }


}
