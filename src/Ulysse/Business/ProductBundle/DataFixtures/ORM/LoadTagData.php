<?php
namespace Ulysse\Business\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\ProductBundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'wording' => 'Auto / moto',
            ),
            array(
                'wording' => 'Livre/CD',
            ),
            array(
                'wording' => 'Décoration intérieur',
            ),
            array(
                'wording' => 'Electro',
            ),
            array(
                'wording' => 'Info',
            ),
            array(
                'wording' => 'Mobilier',
            ),
            array(
                'wording' => 'Matérielsport',
            ),
            array(
                'wording' => 'Téléphone',
            ),
            array(
                'wording' => 'Habit',
            ),
        );

        foreach ($tab as $row)
        {
            $tag = new Tag();
            $tag->setWording($row['wording']);

            // On déclenche l'enregistrement
            $manager->persist($tag);
            $this->addReference($row['wording'], $tag);
        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 3;
    }
}