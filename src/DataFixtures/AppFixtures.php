<?php

namespace App\DataFixtures;

use App\Entity\ProductCategory;
use App\Entity\ProductGender;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $productGender1 = new ProductGender;
        $productGender1->setGenderName('Women');
        $manager->persist($productGender1);

        $productGender2 = new ProductGender;
        $productGender2->setGenderName('Men');
        $manager->persist($productGender2);

        $productCat1 = new ProductCategory;
        $productCat1->setCategoryName('Dresses')
                    ->setCategoryImage('/images/coats_women.png');



        $manager->flush();
    }
}
