<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 04/10/14
 * Time: 00:25
 */

namespace Sheikhu\LibraryBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sheikhu\LibraryBundle\Entity\Categorie;

class LoadCategoriesData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $categorie = new Categorie();

        $categorie->setNom("Aventure");
        $manager->persist($categorie);
        $manager->flush();

        $this->addReference("aventure", $categorie);

        foreach(range(1, 10) as $i)
        {
            $categorie = new Categorie();
            $categorie->setNom($faker->sentence(2));
            $manager->persist($categorie);
        }
        $manager->flush();
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