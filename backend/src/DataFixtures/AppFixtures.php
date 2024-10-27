<?php

namespace App\DataFixtures;

use App\Entity\Formule;
use App\Entity\Project;
use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $project1 = (new Project())
            ->setTitle('Green Goodies')
            ->setDescription("Site e-commerce pour acheter des fournitures écolo")
            ->setShortDescription("Site e-commerce de produits bio")
            ->setPicture('greengoodies.webp');
        $manager->persist($project1);
        $project2 = (new Project())
            ->setTitle('Tasklinker')
            ->setDescription("Site e-commerce pour acheter des fournitures écolo")
            ->setShortDescription("Site e-commerce")
            ->setPicture('greengoodies.webp');
        $manager->persist($project2);

        $tag1 = (new Tags())
            ->setName('Symfony')
            ->addProject($project1)
            ->addProject($project2);
        $manager->persist($tag1);

        $tag2 = (new Tags())
            ->setName("Vue.js")
            ->addProject($project1)
            ->addProject($project2);
        $manager->persist($tag2);

        $formule1 = (new Formule())
            ->setName('Développement Web Basique');
        $manager->persist($formule1);
        $formule2 = (new Formule())
            ->setName('Application Web Avancée');
        $manager->persist($formule2);
        $formule3 = (new Formule())
            ->setName("Développement Complet d'une Plateforme SaaS");
        $manager->persist($formule3);

        $manager->flush();
    }
}
