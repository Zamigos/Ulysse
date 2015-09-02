<?php
namespace Ulysse\Business\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\SupportBundle\Entity\Ticket;
use Ulysse\Business\SupportBundle\Entity\Response;

class LoadTicketData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'title' => 'Problème avec un vendeur',
                'content' => 'Bonjour je rencontre un problème avec l\'utilisateur ArnaudPontois sur l\'une des dernière vente' ,
                'date' => new \DateTime('now'),
                'user' => $this->getReference('Ulysse'),
                'seen' => 0,
                'fenced' => 0,
            ),
            array(
                'title' => 'Je ne retrouve plus les informations d\'une ancienne vente',
                'content' => 'Bonjour, je me permet de vous contacter car j\'ai constaté que je ne retrouvais plus une ancienne vente réalisé',
                'date' => new \DateTime('now'),
                'user' => $this->getReference('ArnaudPontois'),
                'seen' => 1,
                'fenced' => 0,
            ),
            array(
                'title' => 'Réinitialisation mot de passe',
                'content' => 'Bonjour, je vous contact car j\'ai reçu par mail une demande de réinitialisation de mon mot de passe, or je n\'ai effectué aucune demande',
                'date' => new \DateTime('now'),
                'user' => $this->getReference('ArnaudPontois'),
                'seen' => 1,
                'fenced' => 0,
            ),
        );

        foreach ($tab as $row)
        {
            $message = new Ticket();
            $message->setTitle($row['title']);
            $message->setContent($row['content']);
            $message->setDate($row['date']);
            $message->setUser($row['user']);
            $message->setSeen($row['seen']);
            $message->setFenced($row['fenced']);

            $this->addReference($row['title'], $message);

            $manager->persist($message);
        }
        // Liste des choses à ajouter
        $tab = array(
            array(
                'content' => 'Quel problème rencontrez vous?',
                'date' => new \DateTime('now'),
                'ticket' => $this->getReference('Problème avec un vendeur'),
                'user' => $this->getReference('support'),
                'seen' => 0,
            ),
            array(
                'content' => 'Le problème est que j\'ai acheté un produit à ce vendeur et que je ne l\'ai jamais reçu. Que pouvez vous faire?',
                'date' => new \DateTime('now'),
                'ticket' => $this->getReference('Problème avec un vendeur'),
                'user' => $this->getReference('Ulysse'),
                'seen' => 1,
            ),
            array(
                'content' => 'Nous ouvrons une enquête de suite et nous reviendrons vers vous dès que possible..',
                'date' => new \DateTime('now'),
                'ticket' => $this->getReference('Problème avec un vendeur'),
                'user' => $this->getReference('support'),
                'seen' => 1,
            ),
        );

        foreach ($tab as $row)
        {
            $message = new Response();
            $message->setContent($row['content']);
            $message->setDate($row['date']);
            $message->setTicket($row['ticket']);
            $message->setUser($row['user']);
            $message->setSeen($row['seen']);

            $manager->persist($message);
        }

        $manager->flush();

    }

    public function getOrder()
    {
        return 7;
    }
}