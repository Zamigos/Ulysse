<?php
namespace Ulysse\Business\SaleBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ulysse\Business\SaleBundle\Entity\Image;

class LoadImageSaleData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'path' => __DIR__.'/img/play4-1.jpg',
                'name' => 'play4-1.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 1'
            ),
            array(
                'path' => __DIR__.'/img/play4-2.jpg',
                'name' => 'play4-2.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 2'
            ),
            array(
                'path' => __DIR__.'/img/play4-3.jpg',
                'name' => 'play4-3.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 3'
            ),
            array(
                'path' => __DIR__.'/img/play4-4.jpg',
                'name' => 'play4-4.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 4'
            ),
            array(
                'path' => __DIR__.'/img/play4-5.jpg',
                'name' => 'play4-5.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 5'
            ),
            array(
                'path' => __DIR__.'/img/play4-6.jpg',
                'name' => 'play4-6.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 6'
            ),
            array(
                'path' => __DIR__.'/img/play4-7.jpg',
                'name' => 'play4-7.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 7'
            ),
            array(
                'path' => __DIR__.'/img/play4-8.jpg',
                'name' => 'play4-8.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 8'
            ),
            array(
                'path' => __DIR__.'/img/play4-9.jpg',
                'name' => 'play4-9.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 9'
            ),
            array(
                'path' => __DIR__.'/img/play4-10.jpg',
                'name' => 'play4-10.jpg',
                'extension' => 'jpg',
                'alt' => 'Image playstation 4 10'
            ),
            array(
                'path' => __DIR__.'/img/pc1.jpg',
                'name' => 'pc1.jpg',
                'extension' => 'jpg',
                'alt' => 'Image PC numéro 1'
            ),
            array(
                'path' => __DIR__.'/img/pc2.jpg',
                'name' => 'pc2.jpg',
                'extension' => 'jpg',
                'alt' => 'Image pc 2'
            ),
            array(
                'path' => __DIR__.'/img/pc3.jpg',
                'name' => 'pc3.jpg',
                'extension' => 'jpg',
                'alt' => 'Image pc3'
            ),
            array(
                'path' => __DIR__.'/img/pc4.jpg',
                'name' => 'pc4.jpg',
                'extension' => 'jpg',
                'alt' => 'Image pc 4'
            ),
            array(
                'path' => __DIR__.'/img/pcmsi1.jpg',
                'name' => 'pcmsi1.jpg',
                'extension' => 'jpg',
                'alt' => 'Image pc MSI 1'
            ),
            array(
                'path' => __DIR__.'/img/pcmsi2.jpg',
                'name' => 'pcmsi2.jpg',
                'extension' => 'jpg',
                'alt' => 'Image pc MSI 2'
            ),
            array(
                'path' => __DIR__.'/img/tabsony.jpg',
                'name' => 'tabsony.jpg',
                'extension' => 'jpg',
                'alt' => 'Image tablette sony'
            ),
            array(
                'path' => __DIR__.'/img/tabwindows.jpg',
                'name' => 'tabwindows.jpg',
                'extension' => 'jpg',
                'alt' => 'Image  tablette windows'
            ),
            array(
                'path' => __DIR__.'/img/ordimac.jpg',
                'name' => 'ordimac.jpg',
                'extension' => 'jpg',
                'alt' => 'Image IMAC APPLE'
            ),
            array(
                'path' => __DIR__.'/img/macbook.jpg',
                'name' => 'macbook.jpg',
                'extension' => 'jpg',
                'alt' => 'Image macbook'
            ),
            array(
                'path' => __DIR__.'/img/samsung1.jpg',
                'name' => 'samsung1.jpg',
                'extension' => 'jpg',
                'alt' => 'Image telephone samsung'
            ),
            array(
                'path' => __DIR__.'/img/samsung2.jpg',
                'name' => 'samsung2.jpg',
                'extension' => 'jpg',
                'alt' => 'Image telephone samsung'
            ),
        );

        foreach ($tab as $row)
        {
            $upload_image = new UploadedFile($row['path'], $row['name'], null, null, null, true);

            $image = new Image();
            $image->setFile($upload_image);
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
        return 9;
    }
}