<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('en-GB');

        for ($i = 0; $i < 50; $i++) {
        $product = new Product();
        $product->setName("Product " . $i)
                ->setDescription($faker->realText(400))
                ->setPrice(rand(100,6000));

        $manager->persist($product);
        }

        $manager->flush();
    }
}
