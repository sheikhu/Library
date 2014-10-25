<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Membre
 *
 * @ORM\Table(name="membres")
 * @ORM\Entity(repositoryClass="Sheikhu\LibraryBundle\Entity\MembreRepository")
 * @UniqueEntity("code")
 */
class Membre
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
     * @ORM\Column(name="code", type="string", length=255, unique=true, nullable=true)
     *
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(unique=true)
     */
    private $telephone;
    /**
     * @var string
     * @Assert\Email()
     * @ORM\Column(unique=true)
     */
    private $email;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Sheikhu\LibraryBundle\Entity\Pret", mappedBy="membre")
     */
    protected $prets;
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
     * @return Membre
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
     * Set nom
     *
     * @param string $nom
     * @return Membre
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
     * Set prenom
     *
     * @param string $prenom
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Membre
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Membre
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    public function fullName()
    {
        return $this->prenom . " " . $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add prets
     *
     * @param \Sheikhu\LibraryBundle\Entity\Pret $prets
     * @return Membre
     */
    public function addPret(\Sheikhu\LibraryBundle\Entity\Pret $prets)
    {
        $this->prets[] = $prets;

        return $this;
    }

    /**
     * Remove prets
     *
     * @param \Sheikhu\LibraryBundle\Entity\Pret $prets
     */
    public function removePret(\Sheikhu\LibraryBundle\Entity\Pret $prets)
    {
        $this->prets->removeElement($prets);
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
        return $this->fullName();
    }


}
