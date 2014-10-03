<?php

namespace Sheikhu\LibraryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Sluggable\Sluggable;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categorie
{

    use Sluggable;
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Livre", mappedBy="categorie")
     */
    private $livres;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Categorie
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
     * @return ArrayCollection
     */
    public function getLivres()
    {
        return $this->livres;
    }

    /**
     * @param ArrayCollection $livres
     */
    public function setLivres($livres)
    {
        $this->livres = $livres;
    }

    /**
     * Returns an array of the fields used to generate the slug.
     *
     * @return array
     */


    public function getSluggableFields()
    {
        return ['nom'];
    }


}