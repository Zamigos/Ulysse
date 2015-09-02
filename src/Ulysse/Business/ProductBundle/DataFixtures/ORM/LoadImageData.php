<?php
namespace Ulysse\Business\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ulysse\Business\ProductBundle\Entity\Image;

class LoadImageData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'path' => __DIR__.'/img/blendernoir.png',
                'name' => 'blendernoir.png',
                'extension' => 'png',
                'alt' => 'image blender noir'
            ),
            array(
                'path' => __DIR__.'/img/buffet.jpg',
                'name' => 'buffer.jpg',
                'extension' => 'jpg',
                'alt' => 'Image buffet'
            ),
            array(
                'path' => __DIR__.'/img/buthockey1.jpg',
                'name' => 'buthockey1.jpg',
                'extension' => 'jpg',
                'alt' => 'But de hockey en métal'
            ),
            array(
                'path' => __DIR__.'/img/panierbasket.jpg',
                'name' => 'panierbasket.jpg',
                'extension' => 'jpg',
                'alt' => 'panier de basket'
            ),
            array(
                'path' => __DIR__.'/img/cd-djcart.jpg',
                'name' => 'cd-djcart.jpg',
                'extension' => 'jpg',
                'alt' => 'CD du DJ CART'
            ),
            array(
                'path' => __DIR__.'/img/cd-dutron.jpg',
                'name' => 'cd-dutron.jpg',
                'extension' => 'jpg',
                'alt' => 'Cd de Thomas Dutronc'
            ),
            array(
                'path' => __DIR__.'/img/cdrockattitude.jpg',
                'name' => 'cdrockattitude.jpg',
                'extension' => 'jpg',
                'alt' => 'CD rock attitude'
            ),
            array(
                'path' => __DIR__.'/img/comode.jpg',
                'name' => 'comode.jpg',
                'extension' => 'jpg',
                'alt' => 'Meuble comode'
            ),
            array(
                'path' => __DIR__.'/img/robe-verte.png',
                'name' => 'robe-verte.png',
                'extension' => 'png',
                'alt' => 'Ensemble Femme'
            ),
            array(
                'path' => __DIR__.'/img/lampe1.jpg',
                'name' => 'lampe1.jpg',
                'extension' => 'jpg',
                'alt' => 'Lampe'
            ),
            array(
                'path' => __DIR__.'/img/lampe2.jpg',
                'name' => 'lampe2.jpg',
                'extension' => 'jpg',
                'alt' => 'lampe'
            ),
            array(
                'path' => __DIR__.'/img/lampe3.jpg',
                'name' => 'lampe3.jpg',
                'extension' => 'jpg',
                'alt' => 'Lampe'
            ),
            array(
                'path' => __DIR__.'/img/lampe4.jpg',
                'name' => 'lampe4.jpg',
                'extension' => 'jpg',
                'alt' => 'Lampe'
            ),
            array(
                'path' => __DIR__.'/img/machinealaver.jpg',
                'name' => 'machinealaver.jpg',
                'extension' => 'jpg',
                'alt' => 'Machine a Laver'
            ),
            array(
                'path' => __DIR__.'/img/ordiapple.jpg',
                'name' => 'ordiapple.jpg',
                'extension' => 'jpg',
                'alt' => 'ordinateur'
            ),
            array(
                'path' => __DIR__.'/img/ordilenovo.jpg',
                'name' => 'ordilenovo.jpg',
                'extension' => 'jpg',
                'alt' => 'ordinateur'
            ),
            array(
                'path' => __DIR__.'/img/ordiapple2.jpg',
                'name' => 'ordiapple2.jpg',
                'extension' => 'jpg',
                'alt' => 'ordi apple'
            ),
            array(
                'path' => __DIR__.'/img/ordimsi.jpeg',
                'name' => 'ordimsi.jpeg',
                'extension' => 'jpeg',
                'alt' => 'ordinateur MSI'
            ),
            array(
                'path' => __DIR__.'/img/polo.jpg',
                'name' => 'polo.jpg',
                'extension' => 'jpg',
                'alt' => 'Polo Homme'
            ),
            array(
                'path' => __DIR__.'/img/livre-got.jpg',
                'name' => 'livre-got.jpg',
                'extension' => 'jpg',
                'alt' => 'Livre Game Of Throne'
            ),
            array(
                'path' => __DIR__.'/img/Nvidia-manette.jpg',
                'name' => 'Nvidia-manette.jpg',
                'extension' => 'jpg',
                'alt' => 'Console Nvidia'
            ),
            array(
                'path' => __DIR__.'/img/tablettelenovo.png',
                'name' => 'tablettelenovo.png',
                'extension' => 'png',
                'alt' => 'Tablette lenovo'
            ),
            array(
                'path' => __DIR__.'/img/tablettesony.jpg',
                'name' => 'tablettesony.jpg',
                'extension' => 'jpg',
                'alt' => 'Tablette Sony'
            ),
            array(
                'path' => __DIR__.'/img/tablettewindows.png',
                'name' => 'tablettewindows.png',
                'extension' => 'png',
                'alt' => 'Tablette Windows'
            ),
            array(
                'path' => __DIR__.'/img/samsung-galaxy-S3.jpg',
                'name' => 'samsung-galaxy-S3.jpg',
                'extension' => 'jpg',
                'alt' => 'Telephone Samsung'
            ),
            array(
                'path' => __DIR__.'/img/playstation4.jpg',
                'name' => 'playstation4.jpg',
                'extension' => 'jpg',
                'alt' => 'Playstation 4'
            ),

        );

        foreach ($tab as $row)
        {
            $upload_images = new UploadedFile($row['path'], $row['name'], null, null, null, true);

            $image = new Image();
            $image->setFile($upload_images);
            $image->setExtension($row['extension']);
            $image->setAlt($row['alt']);

            // On déclenche l'enregistrement
            $manager->persist($image);
            $this->addReference($row['name'], $image);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 4;
    }
}