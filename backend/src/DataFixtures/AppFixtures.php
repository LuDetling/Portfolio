<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $project = (new Project())
            ->setTitle('Green Goodies')
            ->setDescription("Site e-commerce pour acheter des fournitures écolo")
            ->setShortDescription("Site e-commerce de produits bio")
            ->setPicture('greengoodies.webp');
        $manager->persist($project);
        $project2 = (new Project())
            ->setTitle('Tasklinker')
            ->setDescription("Site e-commerce pour acheter des fournitures écolo")
            ->setShortDescription("Site e-commerce")
            ->setPicture('greengoodies.webp');
        $manager->persist($project2);

        $tag1 = (new Tags())
            ->setName('Symfony')
            ->addProject($project)
            ->addProject($project2);
        $manager->persist($tag1);

        $tag2 = (new Tags())
            ->setName("Vue.js")
            ->addProject($project)
            ->addProject($project2);
        $manager->persist($tag2);

        $manager->flush();
    }
}
