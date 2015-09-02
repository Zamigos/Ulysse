<?php
namespace Ulysse\Business\ProductBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\ProductBundle\Entity\Product;

class LoadProductData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'name' => 'Blender noir 5447',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Electro-ménager'),
                'tag' => $this->getReference('Electro'),
                'image' => $this->getReference('blendernoir.png'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Buffet Orsendur',
                'description' => 'Integer volutpat elit sed purus venenatis, sit amet lacinia quam dictum. Fusce luctus tellus mollis turpis elementum, nec cursus lorem volutpat. Cras lorem lectus, scelerisque condimentum nisl quis, aliquam convallis leo. Nulla sed mauris accumsan, fermentum ipsum nec, aliquam nulla. Maecenas vel nibh quis orci molestie placerat. Quisque eleifend risus ipsum, eget semper mauris cursus sed. Sed massa felis, mollis a libero ac, mattis posuere tellus. Nullam finibus tortor at lacus fermentum aliquet. Praesent maximus massa nec lectus eleifend condimentum. Cras vel tortor aliquam, placerat est eleifend, laoreet ipsum. Sed porta erat at mauris aliquet, sed fringilla nisl interdum. Ut gravida urna eleifend orci iaculis commodo. Quisque aliquet felis a libero aliquam porttitor. Morbi iaculis vulputate libero, quis pulvinar leo egestas eget. Praesent at nibh lorem. In suscipit nunc in elementum interdum. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Meuble'),
                'tag' => $this->getReference('Mobilier'),
                'image' => $this->getReference('buffer.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'But de Hockey AlacrossDor',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Sport'),
                'tag' => $this->getReference('Matérielsport'),
                'image' => $this->getReference('buthockey1.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Panier de basket',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Sport'),
                'tag' => $this->getReference('Matérielsport'),
                'image' => $this->getReference('panierbasket.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'CD Remix Dj - Cart',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Culture'),
                'tag' => $this->getReference('Livre/CD'),
                'image' => $this->getReference('cd-djcart.jpg'),
                'state' => 2,
                'selected' => 1
            ),
            array(
                'name' => 'CD de Thomas Dutronc',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Culture'),
                'tag' => $this->getReference('Livre/CD'),
                'image' => $this->getReference('cd-dutron.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'CD Rock attitude',
                'description' => 'Integer volutpat elit sed purus venenatis, sit amet lacinia quam dictum. Fusce luctus tellus mollis turpis elementum, nec cursus lorem volutpat. Cras lorem lectus, scelerisque condimentum nisl quis, aliquam convallis leo. Nulla sed mauris accumsan, fermentum ipsum nec, aliquam nulla. Maecenas vel nibh quis orci molestie placerat. Quisque eleifend risus ipsum, eget semper mauris cursus sed. Sed massa felis, mollis a libero ac, mattis posuere tellus. Nullam finibus tortor at lacus fermentum aliquet. Praesent maximus massa nec lectus eleifend condimentum. Cras vel tortor aliquam, placerat est eleifend, laoreet ipsum. Sed porta erat at mauris aliquet, sed fringilla nisl interdum. Ut gravida urna eleifend orci iaculis commodo. Quisque aliquet felis a libero aliquam porttitor. Morbi iaculis vulputate libero, quis pulvinar leo egestas eget. Praesent at nibh lorem. In suscipit nunc in elementum interdum. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Culture'),
                'tag' => $this->getReference('Livre/CD'),
                'image' => $this->getReference('cdrockattitude.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Comode Espectra',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Meuble'),
                'tag' => $this->getReference('Mobilier'),
                'image' => $this->getReference('comode.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Playstation 4',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('playstation4.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Robe d\'été',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Vêtement'),
                'tag' => $this->getReference('Habit'),
                'image' => $this->getReference('robe-verte.png'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Lampe Rosalia',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Décoration'),
                'tag' => $this->getReference('Décoration intérieur'),
                'image' => $this->getReference('lampe1.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Lampe Isirélia',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Décoration'),
                'tag' => $this->getReference('Décoration intérieur'),
                'image' => $this->getReference('lampe2.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Lampe Altor',
                'description' => 'Integer volutpat elit sed purus venenatis, sit amet lacinia quam dictum. Fusce luctus tellus mollis turpis elementum, nec cursus lorem volutpat. Cras lorem lectus, scelerisque condimentum nisl quis, aliquam convallis leo. Nulla sed mauris accumsan, fermentum ipsum nec, aliquam nulla. Maecenas vel nibh quis orci molestie placerat. Quisque eleifend risus ipsum, eget semper mauris cursus sed. Sed massa felis, mollis a libero ac, mattis posuere tellus. Nullam finibus tortor at lacus fermentum aliquet. Praesent maximus massa nec lectus eleifend condimentum. Cras vel tortor aliquam, placerat est eleifend, laoreet ipsum. Sed porta erat at mauris aliquet, sed fringilla nisl interdum. Ut gravida urna eleifend orci iaculis commodo. Quisque aliquet felis a libero aliquam porttitor. Morbi iaculis vulputate libero, quis pulvinar leo egestas eget. Praesent at nibh lorem. In suscipit nunc in elementum interdum. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Décoration'),
                'tag' => $this->getReference('Décoration intérieur'),
                'image' => $this->getReference('lampe3.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Lampe Plenfor',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Décoration'),
                'tag' => $this->getReference('Décoration intérieur'),
                'image' => $this->getReference('lampe4.jpg'),
                'state' => 0,
                'selected' => 0
            ),
            array(
                'name' => 'Machine à laver',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Electro-ménager'),
                'tag' => $this->getReference('Electro'),
                'image' => $this->getReference('machinealaver.jpg'),
                'state' => 0,
                'selected' => 0
            ),
            array(
                'name' => 'Ordinateur Apple',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('ordiapple.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Apple IMAC',
                'description' => 'Integer volutpat elit sed purus venenatis, sit amet lacinia quam dictum. Fusce luctus tellus mollis turpis elementum, nec cursus lorem volutpat. Cras lorem lectus, scelerisque condimentum nisl quis, aliquam convallis leo. Nulla sed mauris accumsan, fermentum ipsum nec, aliquam nulla. Maecenas vel nibh quis orci molestie placerat. Quisque eleifend risus ipsum, eget semper mauris cursus sed. Sed massa felis, mollis a libero ac, mattis posuere tellus. Nullam finibus tortor at lacus fermentum aliquet. Praesent maximus massa nec lectus eleifend condimentum. Cras vel tortor aliquam, placerat est eleifend, laoreet ipsum. Sed porta erat at mauris aliquet, sed fringilla nisl interdum. Ut gravida urna eleifend orci iaculis commodo. Quisque aliquet felis a libero aliquam porttitor. Morbi iaculis vulputate libero, quis pulvinar leo egestas eget. Praesent at nibh lorem. In suscipit nunc in elementum interdum. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('ordiapple2.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Ordinateur Lénovo 187891DR',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('ordilenovo.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Ordinateur MSI 5447',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris.',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('ordimsi.jpeg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Polo Rugby Homme ',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Vêtement'),
                'tag' => $this->getReference('Habit'),
                'image' => $this->getReference('polo.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Livre de la saga GOT',
                'description' => 'Integer volutpat elit sed purus venenatis, sit amet lacinia quam dictum. Fusce luctus tellus mollis turpis elementum, nec cursus lorem volutpat. Cras lorem lectus, scelerisque condimentum nisl quis, aliquam convallis leo. Nulla sed mauris accumsan, fermentum ipsum nec, aliquam nulla. Maecenas vel nibh quis orci molestie placerat. Quisque eleifend risus ipsum, eget semper mauris cursus sed. Sed massa felis, mollis a libero ac, mattis posuere tellus. Nullam finibus tortor at lacus fermentum aliquet. Praesent maximus massa nec lectus eleifend condimentum. Cras vel tortor aliquam, placerat est eleifend, laoreet ipsum. Sed porta erat at mauris aliquet, sed fringilla nisl interdum. Ut gravida urna eleifend orci iaculis commodo. Quisque aliquet felis a libero aliquam porttitor. Morbi iaculis vulputate libero, quis pulvinar leo egestas eget. Praesent at nibh lorem. In suscipit nunc in elementum interdum. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Culture'),
                'tag' => $this->getReference('Livre/CD'),
                'image' => $this->getReference('livre-got.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Console de jeu Nvidia',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('Nvidia-manette.jpg'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Tablette lénovo',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('tablettelenovo.png'),
                'state' => 1,
                'selected' => 1
            ),
            array(
                'name' => 'Tablette Sony',
                'description' => 'Praesent consectetur elit odio, quis elementum urna convallis ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vulputate, libero sit amet ornare faucibus, tortor tellus tincidunt ligula, sit amet pharetra lectus lorem non lacus. Suspendisse malesuada nisl enim, et ultrices ante imperdiet sed. Fusce odio nibh, tincidunt quis varius in, ultrices porttitor metus. Aliquam non lorem tempus, eleifend velit vel, suscipit eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris consectetur, lectus eget lacinia rhoncus, nibh magna mollis diam, volutpat malesuada ligula ipsum vitae felis. Sed non quam id ante pharetra consequat. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('tablettesony.jpg'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Tablette Window',
                'description' => 'Integer volutpat elit sed purus venenatis, sit amet lacinia quam dictum. Fusce luctus tellus mollis turpis elementum, nec cursus lorem volutpat. Cras lorem lectus, scelerisque condimentum nisl quis, aliquam convallis leo. Nulla sed mauris accumsan, fermentum ipsum nec, aliquam nulla. Maecenas vel nibh quis orci molestie placerat. Quisque eleifend risus ipsum, eget semper mauris cursus sed. Sed massa felis, mollis a libero ac, mattis posuere tellus. Nullam finibus tortor at lacus fermentum aliquet. Praesent maximus massa nec lectus eleifend condimentum. Cras vel tortor aliquam, placerat est eleifend, laoreet ipsum. Sed porta erat at mauris aliquet, sed fringilla nisl interdum. Ut gravida urna eleifend orci iaculis commodo. Quisque aliquet felis a libero aliquam porttitor. Morbi iaculis vulputate libero, quis pulvinar leo egestas eget. Praesent at nibh lorem. In suscipit nunc in elementum interdum. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Informatique'),
                'tag' => $this->getReference('Info'),
                'image' => $this->getReference('tablettewindows.png'),
                'state' => 1,
                'selected' => 0
            ),
            array(
                'name' => 'Samsung Galaxy S3',
                'description' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper felis sed consequat porttitor. Vestibulum posuere, arcu ac vulputate auctor, urna metus lacinia est, at pharetra diam dolor non leo. Vivamus et feugiat ex. Etiam at eleifend sapien. Nunc nunc ligula, luctus non magna id, tristique cursus libero. Nullam feugiat lectus ut libero vehicula congue. Nam maximus at ligula at molestie. Curabitur fringilla metus sed libero vulputate convallis. Nullam interdum facilisis massa vitae congue. Suspendisse pellentesque condimentum maximus. Morbi vestibulum nulla vitae odio laoreet, non tristique sem rutrum. Curabitur hendrerit vel lectus non egestas. Vivamus auctor, ante eu gravida mollis, quam odio bibendum nunc, non porta massa lacus vitae mauris. ',
                'addedby' => $this->getReference('Ulysse'),
                'category' => $this->getReference('Téléphonie'),
                'tag' => $this->getReference('Téléphone'),
                'image' => $this->getReference('samsung-galaxy-S3.jpg'),
                'state' => 1,
                'selected' => 1
            ),
        );

        foreach ($tab as $row)
        {
            $product = new Product();
            $product->setName($row['name']);
            $product->setDescription($row['description']);
            $product->setAddedby($row['addedby']);
            $product->setCategory($row['category']);
            $product->addTag($row['tag']);
            $product->setImage($row['image']);
            $product->setState($row['state']);
            $product->setSelected($row['selected']);

            // On déclenche l'enregistrement
            $manager->persist($product);
            $this->addReference($row['name'], $product);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 5;
    }
}