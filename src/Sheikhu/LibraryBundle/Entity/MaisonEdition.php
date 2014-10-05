<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MaisonEdition
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MaisonEdition
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Livre", mappedBy="maisonEdition")
     */
    private $livres;
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
     * Set nom
     *
     * @param string $nom
     * @return MaisonEdition
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
     * Constructor
     */
    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * Add livres
     *
     * @param \Sheikhu\LibraryBundle\Entity\Livre $livres
     * @return MaisonEdition
     */
    public function addLivre(Livre $livres)
    {
        $this->livres[] = $livres;

        return $this;
    }

    /**
     * Remove livres
     *
     * @param \Sheikhu\LibraryBundle\Entity\Livre $livres
     */
    public function removeLivre(\Sheikhu\LibraryBundle\Entity\Livre $livres)
    {
        $this->livres->removeElement($livres);
    }

    /**
     * Get livres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLivres()
    {
        return $this->livres;
    }
}
