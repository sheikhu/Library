<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 04/10/14
 * Time: 00:18
 */

namespace Sheikhu\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Sheikhu\LibraryBundle\Entity\Categorie;
use Sheikhu\LibraryBundle\Entity\Livre;


class LoadLivresData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create();
        $book = new Livre();


        $book->setTitre("L'ile mysterieuse")
            ->setDateAcquis(new \DateTime())
            ->setCategorie($this->getReference("aventure"))
            ->setIsbn($faker->ean13)
            ->setStatut("disponible")
            ->setDateParution($faker->dateTime)
            ->setNombreDisponible(20)
            ->setDateAcquis($faker->dateTime)
            ->setMaisonEdition($this->getReference("eyrolles"));

        $manager->persist($book);
        $manager->flush();

        $this->addReference("ile-mysterieuse", $book);



    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }


}