<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Symfony\Component\Uid\Uuid;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = FakerFactory::create('fr_FR');
        $faker->seed(0);

        for ($i = 0; $i < 4; ++$i) {
            $author = new Author(Uuid::v4(), $faker->name);
            $manager->persist($author);
        }

        $manager->flush();
    }
}
