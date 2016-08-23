<?php

namespace Mire\AdminBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MIRE\AdminBundle\Entity\Categories;

class LoadCategory implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $noms = array(
            'Editoriaux',
            'Economie',
            'Politique',
            'Sport',
            'Social'
        );

        foreach ($noms as $nom) {
            $category = new Categories();
            // On crée la catégorie
            $category->setNom($nom);
            // On la persiste
            $manager->persist($category);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}