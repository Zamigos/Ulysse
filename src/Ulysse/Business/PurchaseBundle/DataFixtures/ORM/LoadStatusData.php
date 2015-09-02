<?php
namespace Ulysse\Business\PurchaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\PurchaseBundle\Entity\Status;

class LoadPurchaseStatusData  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //A ne pas modifier !!!!!!!!! -Enzo
        $tab = array(
            array('status' => 'Non payé'),
            array('status' => 'Payé'),
            array('status' => 'Colis Déposé'),
            array('status' => 'Colis Retiré'),
            array('status' => 'Rembourser'),
            array('status' => 'Annulé'),
        );

        foreach ($tab as $row)
        {
            $status = new Status();
            $status->setWording($row['status']);

            // On déclenche l'enregistrement
            $manager->persist($status);
            $this->addReference($row['status'], $status);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 11;
    }
}