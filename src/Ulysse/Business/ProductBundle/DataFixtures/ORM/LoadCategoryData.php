<?php
namespace Ulysse\Business\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\ProductBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array('wording' => 'Auto/Moto', 'active' => 1),
            array('wording' => 'Culture', 'active' => 1),
            array('wording' => 'Décoration', 'active' => 1),
            array('wording' => 'Electro-ménager', 'active' => 1),
            array('wording' => 'Informatique', 'active' => 1),
            array('wording' => 'Meuble', 'active' => 1),
            array('wording' => 'Sport', 'active' => 1),
            array('wording' => 'Téléphonie', 'active' => 1),
            array('wording' => 'Vêtement', 'active' => 1),
        );

        foreach ($tab as $row)
        {
            $category = new Category();
            $category->setWording($row['wording']);
            $category->setActive($row['active']);

            // On déclenche l'enregistrement
            $manager->persist($category);
            $this->addReference($row['wording'], $category);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 2;
    }
}