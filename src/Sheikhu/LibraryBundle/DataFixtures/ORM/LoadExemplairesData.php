<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 04/10/14
 * Time: 12:30
 */

namespace Sheikhu\LibraryBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Sheikhu\LibraryBundle\Entity\Exemplaire;

class LoadExemplairesData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $book = $this->getReference("ile-mysterieuse");
        $exemplaire = new Exemplaire();

        $exemplaire->setLivre($book);

        $exemplaire->setDateAcquis($faker->dateTime)
            ->setCode($faker->ean8)
            ->setCout(5000)
            ->setEtat("parfait");

        $exemplaire->getLivre()->addExemplaire($exemplaire);

        $manager->persist($exemplaire);
        $manager->persist($book);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }
}