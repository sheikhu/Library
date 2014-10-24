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
use Sheikhu\LibraryBundle\Entity\Membre;
use Sheikhu\UserBundle\Entity\Employe;


class LoadMembersData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        foreach(range(1,30) as $i)
        {

            $member = new Membre();


            $member->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setTelephone($faker->randomNumber(7))
                ->setDateNaissance($faker->dateTime)
                ->setCode($faker->randomNumber(6))
                ->setEmail($faker->email);

            $manager->persist($member);
        }

        $user = new Employe();

        $user->setUsername($faker->userName)
            ->setNom($faker->lastName)
            ->setPrenom($faker->firstName)
            ->setTelephone($faker->randomNumber(7))
            ->setDateNaissance($faker->dateTime)
            ->setCode($faker->randomNumber(6))
            ->setEmail($faker->email)
            ->setPlainPassword("password")
            ->setEnabled(true);

        $manager->persist($member);

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