<?php
// Change the namespace!
namespace Ulysse\Business\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Ulysse\Business\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    //.. $container declaration & setter
    private $container;

    public function load(ObjectManager $manager)
    {
        // Liste des choses à ajouter
        $tab = array(
            array(
                'username' => 'sheets',
                'email' => 'sheets@gmail.com',
                'password' => 'sheets',
                'enabled' => true,
                'blocked' => 0,
                'role' => 'ROLE_ADMIN_SHEETS',
                'firstname' => '',
                'lastname'  => '',
                'address'   => '',
                'cp'        => '',
                'city'      => '',
                'country'   => '',
                'phone'   => '',
            ),
            array(
                'username' => 'support',
                'email' => 'support@gmail.com',
                'password' => 'support',
                'enabled' => true,
                'blocked' => 0,
                'role' => 'ROLE_ADMIN_SUPPORT',
                'firstname' => '',
                'lastname'  => '',
                'address'   => '',
                'cp'        => '',
                'city'      => '',
                'country'   => '',
                'phone'   => '',
            ),
            array(
                'username' => 'SuperAdmin',
                'email' => 'superadmin@gmail.com',
                'password' => 'admin',
                'enabled' => true,
                'blocked' => 0,
                'role' => 'ROLE_SUPER_ADMIN',
                'firstname' => '',
                'lastname'  => '',
                'address'   => '',
                'cp'        => '',
                'city'      => '',
                'country'   => '',
                'phone'   => '',
            ),
            array(
                'username'  => 'ArnaudPontois',
                'email'     => 'arnaudpontois@gmail.com',
                'password'  => '123',
                'enabled'   => true,
                'blocked'   => 0,
                'role'      => 'ROLE_USER',
                'firstname' => 'Arnaud',
                'lastname'  => 'Pontois',
                'address'   => '25 rue des corneilles',
                'cp'        => '95360',
                'city'      => 'Montmagny',
                'country'   => 'France',
                'phone'   => '0187963021',
            ),
            array(
                'username' => 'Ulysse',
                'email' => 'ulysse@gmail.com',
                'password' => '123',
                'enabled' => true,
                'blocked' => 0,
                'role' => 'ROLE_USER',
                'firstname' => 'John',
                'lastname'  => 'ulysse',
                'address'   => '11 rue des taverniers',
                'cp'        => '75012',
                'city'      => 'Paris',
                'country'   => 'France',
                'phone'   => '0156876542',
            ),
        );

        foreach ($tab as $row)
        {
//            // Get our userManager, you must implement `ContainerAwareInterface`
//            $userManager = $this->container->get('fos_user.user_manager');
//
//            // Create our user and set details
//            $user = $userManager->createUser();
            $user = new User();
            $user->setUsername($row['username']);
            $user->setEmail($row['email']);
            $user->setPlainPassword($row['password']);
            //$user->setPassword('3NCRYPT3D-V3R51ON');
            $user->setEnabled($row['enabled']);
            $user->setBlocked($row['blocked']);
            $user->setRoles(array($row['role']));
            $user->setFirstname($row['firstname']);
            $user->setLastname($row['lastname']);
            $user->setAddress($row['address']);
            $user->setCity($row['city']);
            $user->setCp($row['cp']);
            $user->setCountry($row['country']);
            $user->setPhone($row['phone']);

            // Update the user
//            $userManager->updateUser($user, true);
            $manager->persist($user);

            $this->addReference($row['username'], $user);

        }
        $manager->flush();


    }
    public function getOrder()
    {
        return 1;
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;

    }
}