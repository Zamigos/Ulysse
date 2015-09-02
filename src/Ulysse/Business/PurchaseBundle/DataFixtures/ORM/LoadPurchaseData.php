<?php
namespace Ulysse\Business\PurchaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\PurchaseBundle\Entity\Purchase;

class LoadPurchaseData  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)

    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'date' => New \DateTime('2015-01-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat1',
                'firstname' =>  'Edouard',
                'lastname' =>  'Thawne',
                'address' => '22 rue madrid',
                'cp' =>  '75012',
                'city' =>  'Paris',
                'country' =>  'france',
                'amount_total' =>  120.20,
            ),
            array(
                'date' => New \DateTime('2015-01-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat2',
                'firstname' =>  'Hervé',
                'lastname' =>  'Renard',
                'address' => '41 rue des madeleines',
                'cp' =>  '95880',
                'city' =>  'Enghien les bains',
                'country' =>  'france',
                'amount_total' =>  220.57,
            ),
            array(
                'date' => New \DateTime('2015-01-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat3',
                'firstname' =>  'Dominique',
                'lastname' =>  'Herbet',
                'address' => '78 rue de soissons',
                'cp' =>  '02200',
                'city' =>  'Soissons',
                'country' =>  'france',
                'amount_total' =>  180.37,
            ),
            array(
                'date' => New \DateTime('2015-01-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat4',
                'firstname' =>  'Julien',
                'lastname' =>  'Debray',
                'address' => '102 bd de paris',
                'cp' =>  '95150',
                'city' =>  'Cergy',
                'country' =>  'france',
                'amount_total' =>  180.37,
            ),
            array(
                'date' => New \DateTime('2015-02-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat5',
                'firstname' =>  'Antoine',
                'lastname' =>  'Magne',
                'address' => '52 avenue des cordonniers',
                'cp' =>  '02200',
                'city' =>  'Soissons',
                'country' =>  'france',
                'amount_total' =>  310.00,
            ),
            array(
                'date' => New \DateTime('2015-02-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat6',
                'firstname' =>  'Cassandra',
                'lastname' =>  'Noert',
                'address' => '32 rue de rome',
                'cp' =>  '95180',
                'city' =>  'Belloy-en-france',
                'country' =>  'france',
                'amount_total' =>  310.00,
            ),
            array(
                'date' => New \DateTime('2015-02-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat7',
                'firstname' =>  'Matthieu',
                'lastname' =>  'Sommet',
                'address' => '142 bd voltaire',
                'cp' =>  '75013',
                'city' =>  'Paris',
                'country' =>  'france',
                'amount_total' =>  310.00,
            ),
            array(
                'date' => New \DateTime('2015-03-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat8',
                'firstname' =>  'Bernard',
                'lastname' =>  'Thomas',
                'address' => '12 rue de milan',
                'cp' =>  '75012',
                'city' =>  'Paris',
                'country' =>  'france',
                'amount_total' =>  510.00,
            ),
            array(
                'date' => New \DateTime('2015-03-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat9',
                'firstname' =>  'Sandra',
                'lastname' =>  'Simon',
                'address' => '29 rue des petites communes',
                'cp' =>  '95340',
                'city' =>  'Chauvry',
                'country' =>  'france',
                'amount_total' =>  510.20,
            ),
            array(
                'date' => New \DateTime('2015-03-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat10',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' =>  500.00,
            ), array(
                'date' => New \DateTime('2015-03-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat11',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 320.00,
            ), array(
        'date' => New \DateTime('2015-04-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat12',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 320.00,
            ), array(
        'date' => New \DateTime('2015-04-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat13',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' =>  320.00,
            ), array(
        'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat14',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' =>  320.00,
            ), array(
        'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat15',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' =>  320.00,
            ), array(
        'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat16',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 450.00,
            ), array(
        'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat17',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' =>  800.00,
            ), array(
        'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat18',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' =>  800.00,
            ),
            array(
                'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat19',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' =>  800.00,
            ),
            array(
                'date' => New \DateTime('2015-06-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat20',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 800.00,
            ),
            array(
                'date' => New \DateTime('2015-06-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat21',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 800.00,
            ), array(
                'date' => New \DateTime('2015-06-01'),
        //                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat22',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 800.00,
            ), array(
                'date' => New \DateTime(),
        //                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat23',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 800.00,
            ),
            array(
                'date' => New \DateTime('2015-06-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat24',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 300.00,
            ),
            array(
                'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat25',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 300.00,
            ), array(
        'date' => New \DateTime('2015-06-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat26',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 300.00,
            ), array(
        'date' => New \DateTime('2015-05-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat27',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 300.00,
            ), array(
        'date' => New \DateTime('2015-01-01'),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat28',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 300.00,
            ),
            array(
                'date' => New \DateTime(),
//                'salepurchase' => '',
                'user' => $this->getReference('ArnaudPontois'),
                'reference' => 'achat29',
                'firstname' =>  'Arnaud',
                'lastname' =>  'Pontois',
                'address' => '12 rue de lauble',
                'cp' =>  '78280',
                'city' =>  'Aubergenville',
                'country' =>  'france',
                'amount_total' => 332.00,
            ),
            array(
                'date' => New \DateTime(),
//                'salepurchase' => '',
                'user' => $this->getReference('Ulysse'),
                'reference' => 'achat30',
                'firstname' =>  'John',
                'lastname' =>  'Ulysse',
                'address' => '40 rue du chateau',
                'cp' =>  '95180',
                'city' =>  'Deuil la barre',
                'country' =>  'france',
                'amount_total' => 1200.80,
            ),
            array(
                'date' => New \DateTime(),
//                'salepurchase' => '',
                'user' => $this->getReference('Ulysse'),
                'reference' => 'achat31',
                'firstname' =>  'John',
                'lastname' =>  'Ulysse',
                'address' => '40 rue du chateau',
                'cp' =>  '95180',
                'city' =>  'Deuil la barre',
                'country' =>  'france',
                'amount_total' => 1750.80,
            ),
            array(
                'date' => New \DateTime(),
//                'salepurchase' => '',
                'user' => $this->getReference('Ulysse'),
                'reference' => 'achat32',
                'firstname' =>  'John',
                'lastname' =>  'Ulysse',
                'address' => '40 rue du chateau',
                'cp' =>  '95180',
                'city' =>  'Deuil la barre',
                'country' =>  'france',
                'amount_total' => 400.80,
            ),
            array(
                'date' => New \DateTime(),
//                'salepurchase' => '',
                'user' => $this->getReference('Ulysse'),
                'reference' => 'achat33',
                'firstname' =>  'John',
                'lastname' =>  'Ulysse',
                'address' => '40 rue du chateau',
                'cp' =>  '95180',
                'city' =>  'Deuil la barre',
                'country' =>  'france',
                'amount_total' => 500.80,
            ),
            array(
                'date' => New \DateTime(),
//                'salepurchase' => '',
                'user' => $this->getReference('Ulysse'),
                'reference' => 'achat34',
                'firstname' =>  'John',
                'lastname' =>  'Ulysse',
                'address' => '40 rue du chateau',
                'cp' =>  '95180',
                'city' =>  'Deuil la barre',
                'country' =>  'france',
                'amount_total' => 1500.80,
           ),
        );

        foreach ($tab as $row)
        {
            $purchase = new Purchase();
            $purchase->setDate($row['date']);
//            $purchase->addSalepurchase($row['salepurchase']);
            $purchase->setUser($row['user']);
            $purchase->setFirstname($row['firstname']);
            $purchase->setLastname($row['lastname']);
            $purchase->setAddress($row['address']);
            $purchase->setCp($row['cp']);
            $purchase->setCountry($row['country']);
            $purchase->setCity($row['city']);
            $purchase->setAmountTotal($row['amount_total']);

            // On déclenche l'enregistrement
            $manager->persist($purchase);
            $this->addReference($row['reference'], $purchase);


        }
        // On la persiste
        $manager->flush();

    }
    public function getOrder()
    {
        return 12;
    }
}