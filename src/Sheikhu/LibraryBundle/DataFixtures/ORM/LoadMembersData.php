<?php
/**
 * Created by PhpStorm.
 * User: sheikhu
 * Date: 18/10/14
 * Time: 23:13
 */

namespace Sheikhu\LibraryBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Sheikhu\UserBundle\Entity\Employe;
use Sheikhu\UserBundle\Entity\Membre;

class LoadMembersData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        foreach(range(1,10) as $i)
        {
            if($faker->boolean())
            {
                $member = new Membre();
            } else {
                $member = new Employe();
            }

            $member->setUsername($faker->userName)
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setTelephone($faker->randomNumber(7))
                ->setDateNaissance($faker->dateTime)
                ->setCode($faker->randomNumber(6))
                ->setEmail($faker->email)
                ->setPlainPassword("password")
                ->setEnabled(true);

            $manager->persist($member);
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