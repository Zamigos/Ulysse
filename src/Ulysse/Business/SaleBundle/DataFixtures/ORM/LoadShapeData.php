<?php
namespace Ulysse\Business\SaleBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\SaleBundle\Entity\Shape;

class LoadSaleShapeData  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'shapeState'=> 'Bon état',
                'active' => 1,
            ),
            array(
                'shapeState'=> 'Comme neuf',
                'active' => 1,
            ),
            array(
                'shapeState'=> 'Neuf',
                'active' => 1,
            ),
            array(
                'shapeState'=> 'Etat moyen',
                'active' => 1,
            ),
            array(
                'shapeState'=> 'Reconditionné',
                'active' => 1,
            ),
        );

        foreach ($tab as $row)
        {
            $shape = new Shape();
            $shape->setWording($row['shapeState']);
            $shape->setActive($row['active']);

            // On déclenche l'enregistrement
            $manager->persist($shape);
            $this->addReference($row['shapeState'], $shape);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 8;
    }
}