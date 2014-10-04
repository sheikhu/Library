<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 04/10/14
 * Time: 12:31
 */

namespace Sheikhu\LibraryBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Sheikhu\LibraryBundle\Entity\Auteur;

class LoadAuteursData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $auteur = null;

        foreach (range(1, 5) as $i) {
            $auteur = new Auteur();
            $auteur->setNom($faker->lastName)->setPrenom($faker->firstName);
            $manager->persist($auteur);
            $manager->flush();

            $this->addReference($i, $auteur);
        }

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}