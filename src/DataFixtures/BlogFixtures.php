<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('en-GB');

        for ($i = 0; $i < 10; $i++) {
        $blogPost = new Post();
        $blogPost->setTitle($faker->realText(50))
                ->setSlug('')
                ->setCreationDate($faker->dateTime($max = 'now', $timezone = null))
                ->setPublished(true)
                ->setPublishedDate($faker->dateTime($max = 'now', $timezone = null))
                ->setContent($faker->realText(400))
                ->setImage($faker->imageUrl($width = 640, $height = 480));

        $manager->persist($blogPost);
        }

        $manager->flush();
    }
}
