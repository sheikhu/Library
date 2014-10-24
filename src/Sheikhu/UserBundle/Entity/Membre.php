<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 18/10/14
 * Time: 23:03
 */

namespace Sheikhu\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Membre
 * @package Sheikhu\UserBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="membres")
 */
class Membre extends User{

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $commentaire;



}