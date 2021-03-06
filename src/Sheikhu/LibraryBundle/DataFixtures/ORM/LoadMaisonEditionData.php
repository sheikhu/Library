<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 04/10/14
 * Time: 18:50
 */

namespace Sheikhu\LibraryBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sheikhu\LibraryBundle\Entity\MaisonEdition;

class LoadMaisonEditionData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $editeur = new MaisonEdition();

        $editeur->setNom("Eyrolles");

        $manager->persist($editeur);
        $manager->flush();

        $this->addReference("eyrolles", $editeur);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }


} 