<?php
namespace Ulysse\Business\PurchaseBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\PurchaseBundle\Entity\Rating;

class LoadRatingData  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'title' => 'Super vente!',
                'content' => 'Tout s\'est bien passé ! Génial!',
                'date' => New \DateTime(),
                'rating' => 3,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'PC performant et fonctionnel!',
                'content' => 'Un plaisir de l\'allumer et de l\'utiliser!',
                'date' => New \DateTime(),
                'rating' => 3,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Entièrement satisfait!',
                'content' => 'Vendeur ouvert et commercial ! Super!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Content de mon achat',
                'content' => 'Tout s\'est bien passé!',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'La vente s\'est bien déroulé!',
                'content' => 'Produit conforme à la description!',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Totalement satisfait!',
                'content' => 'Bonne relation avec le vendeur!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Tout en douceur!',
                'content' => 'Vendeur calme et posé. Une livraison en temps et en heure!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'En route vers le plaisir!',
                'content' => 'Bien emballé, en bon état! En route pour le fun!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Enfin un bon mac!',
                'content' => 'J\'ai toujours révé d\'avoir un mac! Enfin réalité!',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Content de mon achat!',
                'content' => 'Un bon produit de qualité!',
                'date' => New \DateTime(),
                'rating' => 3,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Un PC solide!',
                'content' => 'Ne pas hésiter!',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Pratique pour un étudiant',
                'content' => 'Pratique et pas cher',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Bien',
                'content' => 'Conforme à ce qui est attendu',
                'date' => New \DateTime(),
                'rating' => 3,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Merci',
                'content' => 'Super content de mon achat!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Bon pc pratique',
                'content' => 'Bien pour la bureautique',
                'date' => New \DateTime(),
                'rating' => 3,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Beau et innovant!',
                'content' => 'Design et performant',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Super utile ce tel!',
                'content' => 'Tout ce dont j\'ai besoin.',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Merci android!',
                'content' => 'Super samsung avec la dernière version android!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Trop beau',
                'content' => 'j\'aime tellement son design',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Robuste!',
                'content' => 'Bonne finition.',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Quel beautée!',
                'content' => 'Super jolie',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Pas vraiment comme attendu',
                'content' => 'Un peu déçu de cet achat',
                'date' => New \DateTime(),
                'rating' => 2,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Vraiment Sympa',
                'content' => 'Beau rapide et fonctionnel',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'En avant l\'aventure',
                'content' => 'Bien emballé, des heures de fun a prévoir',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Trop belle console!',
                'content' => 'Avoir une play 4 c\'est la classe, mais blanche! Encore mieux!!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Produit fidèle a ce qui est attendu',
                'content' => 'Content de mon achat!',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Jolie et grosse config',
                'content' => 'Super content de mon achat, un produit qu\'on ne présente plus',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Un homme heureux!',
                'content' => 'Rien a dire, nuit blanche en perspective!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'SUPER CONSOLE!',
                'content' => 'Une couleur argent, couleur en série limitée',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Gros PC gamer!',
                'content' => 'Super machine pour les acharnés du jeux',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Le gaming transportable!',
                'content' => 'Avec cette machine, je peux maintenant jouer partout!',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('ArnaudPontois'),
            ),
            array(
                'title' => 'Super tablette!',
                'content' => 'Super tablette! Et je ne parle pas de chocolat ;-)!',
                'date' => New \DateTime(),
                'rating' => 4,
                'user' => $this->getReference('Ulysse'),
            ),
            array(
                'title' => 'Le must!',
                'content' => 'Super tablette j\'en suis ravi!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('Ulysse'),
            ),
            array(
                'title' => 'Le IMAC de mes rêves!',
                'content' => 'Vive apple et sa techno de pointe!',
                'date' => New \DateTime(),
                'rating' => 5,
                'user' => $this->getReference('Ulysse'),
            ),
        );

        foreach ($tab as $row)
        {
            $rating = new Rating();
            $rating->setTitle($row['title']);
            $rating->setContent($row['content']);
            $rating->setDate($row['date']);
            $rating->setRate($row['rating']);
            $rating->setUser($row['user']);
            $rating->setModerate(true);

            // On déclenche l'enregistrement
            $manager->persist($rating);
            $this->addReference($row['title'], $rating);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 13;
    }
}