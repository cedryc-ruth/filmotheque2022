<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            'drame',
            'comédie',
            'horreur',
            'science-fiction',
            'action',
        ];

        foreach($categories as $category) {
            $cat = new Category();
            $cat->setName($category);
            $manager->persist($cat);
        }

        $manager->flush();
    }
}
