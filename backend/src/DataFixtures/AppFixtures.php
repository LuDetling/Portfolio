<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $project = new Project();
        $project->setTitle('Green Goodies')
        ->setDescription("Site e-commerce pour acheter des fournitures écolo")
        ->setPicture('greengoodies.webp');
        $manager->persist($project);
        $project2 = new Project();
        $project2->setTitle('Tasklinker')
        ->setDescription("Site e-commerce pour acheter des fournitures écolo")
        ->setPicture('greengoodies.webp');
        $manager->persist($project2);

        $manager->flush();
    }
}
