<?php

namespace App\DataFixtures;

use App\Domain\BaseData;
use App\Entity\Category;
use App\Entity\Graph;
use App\Entity\Subcategory;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@test.fr');
        $user->setPassword('$2y$10$ZSbETDamFjS.OD/iOolpnO2TykE40heQfDF02ailVsTDyxag1Xl6K');
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $manager->persist($user);

        foreach (BaseData::getData() as $categoryData) {
            $category = new Category();
            $category->setTitle($categoryData['title']);
            $category->setEmoji($categoryData['emoji']);
            $category->setDescription($categoryData['subtitle']);
            $manager->persist($category);
            foreach ($categoryData['subcategory'] as $subcategoryData) {
                $subcategory = new Subcategory();
                $subcategory->setTitle($subcategoryData['title']);
                $subcategory->setCategory($category);
                $manager->persist($subcategory);
                foreach ($subcategoryData['graphs'] as $graphData) {
                    $graph = new Graph();
                    $graph->setTitle($graphData['title']);
                    $graph->setIframe($graphData['iframe']);
                    $graph->setSubcategory($subcategory);
                    $manager->persist($graph);
                }
            }
        }

        $manager->flush();
    }
}
