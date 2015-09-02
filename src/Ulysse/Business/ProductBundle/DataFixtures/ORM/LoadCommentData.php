<?php
namespace Ulysse\Business\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\ProductBundle\Entity\Comment;

class LoadCommentData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'title' => 'Bon produit',
                'content' => 'Emballage soigné, conforme a la description',
                'setdate' => new \DateTime('now'),
                'product' => $this->getReference('Machine à laver'),
                'user' => $this->getReference('Ulysse'),
            ),
        );

        foreach ($tab as $row)
        {
            $comment = new Comment();
            $comment->setTitle($row['title']);
            $comment->setContent($row['content']);
            $comment->setDate($row['setdate']);
            $comment->setProduct($row['product']);
            $comment->setUser($row['user']);

            // On déclenche l'enregistrement
            $manager->persist($comment);
        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 6;
    }
}