<?php
namespace Ulysse\Business\SaleBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\SaleBundle\Entity\Sale;

class LoadSaleData  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'saleName' => 'Playstation 4 blanche 2 jeux',
                'stock' => 2,
                'price' => 300,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Comme neuf'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-1.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 blanche avec call of + assassin\'s creed',
                'stock' => 4,
                'price' => 420,
                'observation' => 'Nullam faucibus aliquet sem, vitae auctor purus. Sed ut erat vel arcu venenatis pharetra vel id augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque lacinia nisi maximus elit blandit viverra. Vestibulum porttitor, ipsum sit amet placerat fringilla, augue quam lobortis tortor, vel ullamcorper quam dui ut nisl. In hac habitasse platea dictumst. Nullam purus lacus, consequat et dui eget, scelerisque imperdiet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Duis laoreet, turpis a commodo faucibus, libero dui tristique dolor, a tempor sem dolor quis massa. Nullam a convallis justo, non aliquam magna. Proin ex velit, posuere eget sagittis at, tristique in massa. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Comme neuf'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-2.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 Argent 2 manettes',
                'stock' => 2,
                'price' => 332,
                'observation' => 'Nullam faucibus aliquet sem, vitae auctor purus. Sed ut erat vel arcu venenatis pharetra vel id augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque lacinia nisi maximus elit blandit viverra. Vestibulum porttitor, ipsum sit amet placerat fringilla, augue quam lobortis tortor, vel ullamcorper quam dui ut nisl. In hac habitasse platea dictumst. Nullam purus lacus, consequat et dui eget, scelerisque imperdiet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Duis laoreet, turpis a commodo faucibus, libero dui tristique dolor, a tempor sem dolor quis massa. Nullam a convallis justo, non aliquam magna. Proin ex velit, posuere eget sagittis at, tristique in massa. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Comme neuf'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-3.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 grise 2 manettes',
                'stock' => 2,
                'price' => 310,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-4.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 une manette',
                'stock' => 2,
                'price' => 300,
                'observation' => 'Vivamus non sollicitudin velit. Donec vel scelerisque augue, a venenatis lectus. Fusce dapibus lobortis dapibus. Quisque luctus mollis lorem, et viverra lacus sodales non. Nam eget orci nisi. Morbi porttitor et nibh id interdum. Praesent quis diam ultricies, consequat odio id, placerat lectus. Aliquam vitae quam iaculis dui malesuada dignissim vel ut dui. Donec nisl dui, tempus at tempor vitae, consequat ut est. Nam at risus eu erat consectetur tincidunt quis ac lorem. Nunc enim neque, consequat et libero eu, sagittis porttitor justo. Sed ut dolor arcu. Nulla cursus porttitor mattis. Pellentesque consectetur ornare sem, in tempor nisi gravida at. Suspendisse a tortor faucibus ligula varius tempor. Nam id cursus sem, sed blandit nisi. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-5.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 noir avec 1 jeu',
                'stock' => 2,
                'price' => 250  ,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-6.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 noir 2 manettes',
                'stock' => 2,
                'price' => 300,
                'observation' => 'Vivamus non sollicitudin velit. Donec vel scelerisque augue, a venenatis lectus. Fusce dapibus lobortis dapibus. Quisque luctus mollis lorem, et viverra lacus sodales non. Nam eget orci nisi. Morbi porttitor et nibh id interdum. Praesent quis diam ultricies, consequat odio id, placerat lectus. Aliquam vitae quam iaculis dui malesuada dignissim vel ut dui. Donec nisl dui, tempus at tempor vitae, consequat ut est. Nam at risus eu erat consectetur tincidunt quis ac lorem. Nunc enim neque, consequat et libero eu, sagittis porttitor justo. Sed ut dolor arcu. Nulla cursus porttitor mattis. Pellentesque consectetur ornare sem, in tempor nisi gravida at. Suspendisse a tortor faucibus ligula varius tempor. Nam id cursus sem, sed blandit nisi. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Reconditionné'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-7.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 noir une manette + fifa',
                'stock' => 2,
                'price' => 325,
                'observation' => 'Nullam faucibus aliquet sem, vitae auctor purus. Sed ut erat vel arcu venenatis pharetra vel id augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque lacinia nisi maximus elit blandit viverra. Vestibulum porttitor, ipsum sit amet placerat fringilla, augue quam lobortis tortor, vel ullamcorper quam dui ut nisl. In hac habitasse platea dictumst. Nullam purus lacus, consequat et dui eget, scelerisque imperdiet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Duis laoreet, turpis a commodo faucibus, libero dui tristique dolor, a tempor sem dolor quis massa. Nullam a convallis justo, non aliquam magna. Proin ex velit, posuere eget sagittis at, tristique in massa. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-8.jpg'),
            ),
            array(
                'saleName' => 'PC Tour MSI gaming',
                'stock' => 2,
                'price' => 1200.80,
                'observation' => 'Vivamus non sollicitudin velit. Donec vel scelerisque augue, a venenatis lectus. Fusce dapibus lobortis dapibus. Quisque luctus mollis lorem, et viverra lacus sodales non. Nam eget orci nisi. Morbi porttitor et nibh id interdum. Praesent quis diam ultricies, consequat odio id, placerat lectus. Aliquam vitae quam iaculis dui malesuada dignissim vel ut dui. Donec nisl dui, tempus at tempor vitae, consequat ut est. Nam at risus eu erat consectetur tincidunt quis ac lorem. Nunc enim neque, consequat et libero eu, sagittis porttitor justo. Sed ut dolor arcu. Nulla cursus porttitor mattis. Pellentesque consectetur ornare sem, in tempor nisi gravida at. Suspendisse a tortor faucibus ligula varius tempor. Nam id cursus sem, sed blandit nisi. ',
                'blocked' => 0,
                'product' => $this->getReference('Ordinateur MSI 5447'),
                'user' => $this->getReference('ArnaudPontois'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('pcmsi1.jpg'),
            ),
            array(
                'saleName' => 'PC Portable MSI gaming',
                'stock' => 2,
                'price' => 1750.80,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta.  ',
                'blocked' => 0,
                'product' => $this->getReference('Ordinateur MSI 5447'),
                'user' => $this->getReference('ArnaudPontois'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('pcmsi2.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 noir une manette et 3 jeux',
                'stock' => 2,
                'price' => 400,
                'observation' => 'Nullam faucibus aliquet sem, vitae auctor purus. Sed ut erat vel arcu venenatis pharetra vel id augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque lacinia nisi maximus elit blandit viverra. Vestibulum porttitor, ipsum sit amet placerat fringilla, augue quam lobortis tortor, vel ullamcorper quam dui ut nisl. In hac habitasse platea dictumst. Nullam purus lacus, consequat et dui eget, scelerisque imperdiet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Duis laoreet, turpis a commodo faucibus, libero dui tristique dolor, a tempor sem dolor quis massa. Nullam a convallis justo, non aliquam magna. Proin ex velit, posuere eget sagittis at, tristique in massa. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-9.jpg'),
            ),
            array(
                'saleName' => 'Playstation 4 noir 1 jeux + 2 manettes',
                'stock' => 2,
                'price' => 500,
                'observation' => 'Vivamus non sollicitudin velit. Donec vel scelerisque augue, a venenatis lectus. Fusce dapibus lobortis dapibus. Quisque luctus mollis lorem, et viverra lacus sodales non. Nam eget orci nisi. Morbi porttitor et nibh id interdum. Praesent quis diam ultricies, consequat odio id, placerat lectus. Aliquam vitae quam iaculis dui malesuada dignissim vel ut dui. Donec nisl dui, tempus at tempor vitae, consequat ut est. Nam at risus eu erat consectetur tincidunt quis ac lorem. Nunc enim neque, consequat et libero eu, sagittis porttitor justo. Sed ut dolor arcu. Nulla cursus porttitor mattis. Pellentesque consectetur ornare sem, in tempor nisi gravida at. Suspendisse a tortor faucibus ligula varius tempor. Nam id cursus sem, sed blandit nisi. ',
                'blocked' => 0,
                'product' => $this->getReference('Playstation 4'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('play4-10.jpg'),
            ),
            array(
                'saleName' => 'PC lenovo T200',
                'stock' => 2,
                'price' => 500,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta. ',
                'blocked' => 0,
                'product' => $this->getReference('Ordinateur Lénovo 187891DR'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('pc1.jpg'),
            ),
            array(
                'saleName' => 'PC lenovo EC4410',
                'stock' => 12,
                'price' => 320,
                'observation' => 'JNullam faucibus aliquet sem, vitae auctor purus. Sed ut erat vel arcu venenatis pharetra vel id augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque lacinia nisi maximus elit blandit viverra. Vestibulum porttitor, ipsum sit amet placerat fringilla, augue quam lobortis tortor, vel ullamcorper quam dui ut nisl. In hac habitasse platea dictumst. Nullam purus lacus, consequat et dui eget, scelerisque imperdiet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Duis laoreet, turpis a commodo faucibus, libero dui tristique dolor, a tempor sem dolor quis massa. Nullam a convallis justo, non aliquam magna. Proin ex velit, posuere eget sagittis at, tristique in massa. ',
                'blocked' => 0,
                'product' => $this->getReference('Ordinateur Lénovo 187891DR'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('pc2.jpg'),
            ),
            array(
                'saleName' => 'PC lenovo ETGD447',
                'stock' => 2,
                'price' => 700,
                'observation' => 'Vivamus non sollicitudin velit. Donec vel scelerisque augue, a venenatis lectus. Fusce dapibus lobortis dapibus. Quisque luctus mollis lorem, et viverra lacus sodales non. Nam eget orci nisi. Morbi porttitor et nibh id interdum. Praesent quis diam ultricies, consequat odio id, placerat lectus. Aliquam vitae quam iaculis dui malesuada dignissim vel ut dui. Donec nisl dui, tempus at tempor vitae, consequat ut est. Nam at risus eu erat consectetur tincidunt quis ac lorem. Nunc enim neque, consequat et libero eu, sagittis porttitor justo. Sed ut dolor arcu. Nulla cursus porttitor mattis. Pellentesque consectetur ornare sem, in tempor nisi gravida at. Suspendisse a tortor faucibus ligula varius tempor. Nam id cursus sem, sed blandit nisi. ',
                'blocked' => 0,
                'product' => $this->getReference('Ordinateur Lénovo 187891DR'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('pc3.jpg'),
            ),
            array(
                'saleName' => 'PC lenovo ETGVBH44',
                'stock' => 2,
                'price' => 652,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta. ',
                'blocked' => 0,
                'product' => $this->getReference('Ordinateur Lénovo 187891DR'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('pc4.jpg'),
            ),
            array(
                'saleName' => 'MacBookPRO FFZ11800',
                'stock' => 2,
                'price' => 510,
                'observation' => 'Nullam faucibus aliquet sem, vitae auctor purus. Sed ut erat vel arcu venenatis pharetra vel id augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque lacinia nisi maximus elit blandit viverra. Vestibulum porttitor, ipsum sit amet placerat fringilla, augue quam lobortis tortor, vel ullamcorper quam dui ut nisl. In hac habitasse platea dictumst. Nullam purus lacus, consequat et dui eget, scelerisque imperdiet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Duis laoreet, turpis a commodo faucibus, libero dui tristique dolor, a tempor sem dolor quis massa. Nullam a convallis justo, non aliquam magna. Proin ex velit, posuere eget sagittis at, tristique in massa. ',
                'blocked' => 0,
                'product' => $this->getReference('Apple IMAC'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Comme neuf'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('macbook.jpg'),
            ),
            array(
                'saleName' => 'Samsung alpha',
                'stock' => 2,
                'price' => 450,
                'observation' => 'Vivamus non sollicitudin velit. Donec vel scelerisque augue, a venenatis lectus. Fusce dapibus lobortis dapibus. Quisque luctus mollis lorem, et viverra lacus sodales non. Nam eget orci nisi. Morbi porttitor et nibh id interdum. Praesent quis diam ultricies, consequat odio id, placerat lectus. Aliquam vitae quam iaculis dui malesuada dignissim vel ut dui. Donec nisl dui, tempus at tempor vitae, consequat ut est. Nam at risus eu erat consectetur tincidunt quis ac lorem. Nunc enim neque, consequat et libero eu, sagittis porttitor justo. Sed ut dolor arcu. Nulla cursus porttitor mattis. Pellentesque consectetur ornare sem, in tempor nisi gravida at. Suspendisse a tortor faucibus ligula varius tempor. Nam id cursus sem, sed blandit nisi. ',
                'blocked' => 0,
                'product' => $this->getReference('Samsung Galaxy S3'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Comme neuf'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('samsung1.jpg'),
            ),
            array(
                'saleName' => 'Samsung galaxy S6',
                'stock' => 2,
                'price' => 800,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta. ',
                'blocked' => 0,
                'product' => $this->getReference('Samsung Galaxy S3'),
                'user' => $this->getReference('Ulysse'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('samsung2.jpg'),
            ),
            array(
                'saleName' => 'Tablette Windows',
                'stock' => 2,
                'price' => 800,
                'observation' => 'Nullam faucibus aliquet sem, vitae auctor purus. Sed ut erat vel arcu venenatis pharetra vel id augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque lacinia nisi maximus elit blandit viverra. Vestibulum porttitor, ipsum sit amet placerat fringilla, augue quam lobortis tortor, vel ullamcorper quam dui ut nisl. In hac habitasse platea dictumst. Nullam purus lacus, consequat et dui eget, scelerisque imperdiet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti. Duis laoreet, turpis a commodo faucibus, libero dui tristique dolor, a tempor sem dolor quis massa. Nullam a convallis justo, non aliquam magna. Proin ex velit, posuere eget sagittis at, tristique in massa. ',
                'blocked' => 0,
                'product' => $this->getReference('Tablette Window'),
                'user' => $this->getReference('ArnaudPontois'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('tabwindows.jpg'),
            ),
            array(
                'saleName' => 'Tablette Sony 10"',
                'stock' => 2,
                'price' => 800,
                'observation' => 'Vivamus non sollicitudin velit. Donec vel scelerisque augue, a venenatis lectus. Fusce dapibus lobortis dapibus. Quisque luctus mollis lorem, et viverra lacus sodales non. Nam eget orci nisi. Morbi porttitor et nibh id interdum. Praesent quis diam ultricies, consequat odio id, placerat lectus. Aliquam vitae quam iaculis dui malesuada dignissim vel ut dui. Donec nisl dui, tempus at tempor vitae, consequat ut est. Nam at risus eu erat consectetur tincidunt quis ac lorem. Nunc enim neque, consequat et libero eu, sagittis porttitor justo. Sed ut dolor arcu. Nulla cursus porttitor mattis. Pellentesque consectetur ornare sem, in tempor nisi gravida at. Suspendisse a tortor faucibus ligula varius tempor. Nam id cursus sem, sed blandit nisi. ',
                'blocked' => 0,
                'product' => $this->getReference('Tablette Sony'),
                'user' => $this->getReference('ArnaudPontois'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('tabsony.jpg'),
            ),
            array(
                'saleName' => 'Imac Apple',
                'stock' => 2,
                'price' => 1500,
                'observation' => 'Praesent ac tincidunt erat, in faucibus sem. Ut non risus vitae libero molestie viverra. Curabitur et pharetra tortor. Donec dolor urna, vehicula nec ullamcorper ac, feugiat ut nibh. Suspendisse in molestie nisi, vitae imperdiet nunc. Maecenas in diam suscipit, faucibus erat sit amet, scelerisque diam. Nam mattis quis magna in feugiat. Donec semper porta elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sed vehicula sapien, sed malesuada est. Sed congue mi nec augue molestie dapibus. Donec sit amet sapien velit. Sed luctus non purus nec pretium. Vivamus varius semper euismod. Maecenas ex justo, sodales sed velit vel, lobortis vestibulum leo. Sed viverra vel leo et porta. ',
                'blocked' => 0,
                'product' => $this->getReference('Ordinateur Apple'),
                'user' => $this->getReference('ArnaudPontois'),
                'shape' => $this->getReference('Bon état'),
                'date_added' => new \DateTime(),
                'image' => $this->getReference('ordimac.jpg'),
            ),

        );

        foreach ($tab as $row)
        {
            $sale = new Sale();
            $sale->setName($row['saleName']);
            $sale->setStock($row['stock']);
            $sale->setPrice($row['price']);
            $sale->setObservation($row['observation']);
            $sale->setBlocked($row['blocked']);
            $sale->setProduct($row['product']);
            $sale->setUser($row['user']);
            $sale->setShape($row['shape']);
            $sale->setDateAdded($row['date_added']);
            $sale->setImage($row['image']);

            // On déclenche l'enregistrement
            $manager->persist($sale);
            $this->addReference($row['saleName'], $sale);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 10;
    }
}