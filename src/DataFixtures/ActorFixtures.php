<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use DateTime;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $acteurs = [
            [
                'firstname'=>'bob',
                'lastname'=>'Sull',
                'gender'=>'h',
                'birthday'=>'1978/10/15',
                'movies' => [
                    'Maverick',
                    'Scarface',
                ]
            ],
        ];

        foreach($acteurs as $acteur) {
            $actor = new Actor();
            $actor->setFirstname($acteur['firstname']);
            $actor->setLastname($acteur['lastname']);
            $actor->setGender($acteur['gender']);
            $actor->setBirthday(new DateTime($acteur['birthday']));

            foreach($acteur['movies'] as $movie) {
                $actor->addMovie($this->getReference($movie));
            }          

            $manager->persist($actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MovieFixtures::class,
        ];
    }
}
