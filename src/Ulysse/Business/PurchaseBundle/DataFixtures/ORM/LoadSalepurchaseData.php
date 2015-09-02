<?php
namespace Ulysse\Business\PurchaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\PurchaseBundle\Entity\Salepurchase;

class LoadSalePurchaseData  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo ETGVBH44'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Super vente!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat1'),
                'amount' => 120.20,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo ETGVBH44'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('PC performant et fonctionnel!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat2'),
                'amount' => 220.57,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo ETGVBH44'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Entièrement satisfait!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat3'),
                'amount' => 180.37,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo ETGVBH44'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Content de mon achat'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat4'),
                'amount' => 180.37,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 grise 2 manettes'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('La vente s\'est bien déroulé!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat5'),
                'amount' => 310.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 grise 2 manettes'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Totalement satisfait!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat6'),
                'amount' => 310.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 grise 2 manettes'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Tout en douceur!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat7'),
                'amount' => 310.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('MacBookPRO FFZ11800'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('En route vers le plaisir!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat8'),
                'amount' => 510.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('MacBookPRO FFZ11800'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Enfin un bon mac!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat9'),
                'amount' => 510.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo T200'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Content de mon achat!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat10'),
                'amount' => 500.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo EC4410'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Un PC solide!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat11'),
                'amount' => 320.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo EC4410'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Pratique pour un étudiant'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat12'),
                'amount' => 320.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo EC4410'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Bien'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat13'),
                'amount' => 320.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo EC4410'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Merci'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat14'),
                'amount' => 320.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC lenovo EC4410'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Bon pc pratique'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat15'),
                'amount' => 320.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung alpha'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Beau et innovant!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat16'),
                'amount' => 450.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung galaxy S6'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Super utile ce tel!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat17'),
                'amount' => 800.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung galaxy S6'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Merci android!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat18'),
                'amount' => 800.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung galaxy S6'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Trop beau'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat19'),
                'amount' => 800.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung galaxy S6'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Robuste!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat20'),
                'amount' => 800.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung galaxy S6'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Quel beautée!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat21'),
                'amount' => 800.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung galaxy S6'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Pas vraiment comme attendu'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat22'),
                'amount' => 800.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Samsung galaxy S6'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Vraiment Sympa'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat23'),
                'amount' => 800.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 blanche 2 jeux'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('En avant l\'aventure'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat24'),
                'amount' => 300.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 blanche 2 jeux'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Trop belle console!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat25'),
                'amount' => 300.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 blanche 2 jeux'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Produit fidèle a ce qui est attendu'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat26'),
                'amount' => 300.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 blanche 2 jeux'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Jolie et grosse config'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat27'),
                'amount' => 300.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 blanche 2 jeux'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Un homme heureux!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat28'),
                'amount' => 300.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Playstation 4 Argent 2 manettes'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('SUPER CONSOLE!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat29'),
                'amount' => 332.00,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC Tour MSI gaming'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Gros PC gamer!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat30'),
                'amount' => 1200.80,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('PC Portable MSI gaming'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Le gaming transportable!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat31'),
                'amount' => 1750.80,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Tablette Windows'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Super tablette!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat32'),
                'amount' => 400.80,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Tablette Sony 10"'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Le must!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat33'),
                'amount' => 500.80,
            ),
            array(
                'quantity' => 1,
                'sale' => $this->getReference('Imac Apple'),
                'status' => $this->getReference('Colis Retiré'),
                'rating' => $this->getReference('Le IMAC de mes rêves!'),
                'statusdate' => New \DateTime(),
                'purchase' => $this->getReference('achat34'),
                'amount' => 1500.80,
            ),

        );

        foreach ($tab as $row)
        {
            $sale_purchase = new Salepurchase();
            $sale_purchase->setQuantity($row['quantity']);
            $sale_purchase->setSale($row['sale']);
            $sale_purchase->setStatus($row['status']);
            $sale_purchase->setRating($row['rating']);
            $sale_purchase->setPurchase($row['purchase']);
            $sale_purchase->setStatusdate($row['statusdate']);
            $sale_purchase->setAmount($row['amount']);

            // On déclenche l'enregistrement
            $manager->persist($sale_purchase);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 14;
    }
}