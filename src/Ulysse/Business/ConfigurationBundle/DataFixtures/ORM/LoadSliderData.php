<?php
namespace Ulysse\Business\ConfigurationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ulysse\Business\ConfigurationBundle\Entity\Slider;

class LoadImageSliderData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(

            array(
                'path' => __DIR__.'/img/imgslide1.jpg',
                'name' => 'imgslide1.jpg',
                'extension' => 'jpg',
                'alt' => 'image slide 1',
                'content' => 'Des produits divers et variés pour répondre à vos attentes',
                'title' => 'Réel besoin ou juste une envie?'
            ),
            array(
                'path' => __DIR__.'/img/imgslide2.jpg',
                'name' => 'imgslide2.jpg',
                'extension' => 'jpg',
                'alt' => 'image slide 2',
                'content' => 'Site responsive pour vous accompagner où que vous soyez',
                'title' => 'Un site intuitif et créatif pour faciliter votre navigation!'
            ),
            array(
                'path' => __DIR__.'/img/imgslide3.jpg',
                'name' => 'imgslide3.jpg',
                'extension' => 'jpg',
                'alt' => 'image slide 3',
                'content' => 'Tous nos moyens de paiement sont sécurisés',
                'title' => 'Payez en toute sécurité!'
            ),
        );

        foreach ($tab as $row)
        {
            $upload_images = new UploadedFile($row['path'], $row['name'], null, null, null, true);

            $slider = new Slider();
            $slider->setFile($upload_images);
            $slider->setExtension($row['extension']);
            $slider->setAlt($row['alt']);
            $slider->setContent($row['content']);
            $slider->setTitle($row['title']);


            // On déclenche l'enregistrement
            $manager->persist($slider);
            $this->addReference($row['name'], $slider);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 16;
    }
}