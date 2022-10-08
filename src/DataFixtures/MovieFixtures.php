<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;
use App\Entity\Category;
use App\Repository\MovieRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $movies = [
            [
                'title'=>'Maverick',
                'description'=>'...',
                'category'=>'action'
            ],
            [
                'title'=>'Do The Right Thing',
                'description'=>'...',
                'category'=>'drame'
            ],
            [
                'title'=>'Scarface',
                'description'=>'...',
                'category'=>'drame'
            ],
        ];

        foreach($movies as $movie) {
            $m = new Movie();
            $m->setTitle($movie['title']);
            $m->setDescription($movie['description']);
            $m->setCategory($this->getReference($movie['category']));

            $manager->persist($m);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
