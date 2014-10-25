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
use Sheikhu\LibraryBundle\Entity\Pret;
use Sheikhu\UserBundle\Entity\Employe;
use Symfony\Component\Security\Core\Util\SecureRandom;


class LoadMembersData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $generator = new SecureRandom();

        foreach(range(1,30) as $i)
        {

            $member = new Membre();


            $member->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setCode($generator->nextBytes(6))
                ->setTelephone($faker->randomNumber(7))
                ->setDateNaissance($faker->dateTime)
                ->setCode($faker->randomNumber(6))
                ->setEmail($faker->email);

            $pret = new Pret();

            $n = $faker->numberBetween(4, 10);

            $pret->setDatePret($faker->dateTime);
            $dateRetourPrevue = $pret->getDatePret()->add(new \DateInterval("P".$n."D"));
            $pret->setDateRetourPrevue($dateRetourPrevue)
                ->setMembre($member)
                ->addExemplaire($this->getReference("exemplaire-ile-mysterieuse"))
                ->addExemplaire($this->getReference("exemplaire-dale"));


            $manager->persist($member);
            $manager->persist($pret);

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
        return 5;
    }


} 