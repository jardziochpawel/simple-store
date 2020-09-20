<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('one cake');
        $product->setPrice(14.50);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('cake with cream');
        $product->setPrice(19.21);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('asdasd sasaa');
        $product->setPrice(18.22);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('asda');
        $product->setPrice(12.54);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('cake');
        $product->setPrice(43.23);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('cake cake cake');
        $product->setPrice(23.12);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('cake cake');
        $product->setPrice(13.23);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('Priceless cake widget');
        $product->setPrice(11.99);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('cake Priceless widget');
        $product->setPrice(16.10);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('Priceless widget cake');
        $product->setPrice(12.80);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('cake widget');
        $product->setPrice(17.50);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('Priceless cake');
        $product->setPrice(12.50);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);

        $product = new Product();
        $product->setName('cake');
        $product->setPrice(15.50);
        $product->setDescription('Is it really hard to come up with a description for a product that will have over 100 characters? for sure after the tournament');
        $manager->persist($product);


        $manager->flush();
    }
}
