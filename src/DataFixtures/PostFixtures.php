<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Symfony\Component\Uid\Uuid;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = FakerFactory::create('fr_FR');

        foreach ($manager->getRepository(Author::class)->findAll() as $author) {
            for ($i = 1; $i < 10; $i++) {
                $post = new Post(Uuid::v4(), $author);
                $post->setTitle($faker->realTextBetween(40, 100));
                $post->setDescription($faker->realText(500));
                $post->setImageUrl('https://static.colizey.fr/author/profile/ba510efd-a6c4-4585-8133-52aaff584ad4.jpg');
                $manager->persist($post);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AuthorFixtures::class,
        ];
    }
}
