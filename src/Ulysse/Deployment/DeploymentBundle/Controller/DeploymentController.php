<?php

namespace Ulysse\Deployment\DeploymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Ulysse\Business\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Ulysse\Business\ConfigurationBundle\Entity\Configuration;

class DeploymentController extends Controller {
    //@TODO: - Créer des formtype pour valider les formulaires
    //       - Exécuter la commande de génération des fixtures (execCommands)
    //       - Upload du logo de la boutique (checkShopAction)

    /**
     * Déploie l'application depuis les données en session
     * @return Response
     */
    public function generateDeploymentAction() {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {

            // Récupération de la session
            $session = $this->get('session');

            // Récupération des paramètres en session
            $administrator = $session->get('administrator');
            $shop = $session->get('shop');
            
            // Exécution des commandes d'initialisation de la BDD 
            $this->execCommands();

            // Création de l'administrateur
            $this->insertAdministrator($administrator);

            // Créé la configuration
            $this->createConfiguration($shop);

            // Reset de la session
            $session->clear();
        }

        return new Response(json_encode(array('error' => false)));
    }

    /**
     * Gère les données renvoyées par le formulaire administrateur
     * @return Response
     */
    public function checkAdministratorAction() {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {

            // Récupération de la session
            $session = $this->get('session');

            // Récupération des données du formulaire
            $administrator = $this->getDataRequest($request);

            // Vérification des champs obligatoires
            if ($administrator['username'] == '') {
                return new Response(json_encode(
                                $this->generateError("Le pseudo est obligatoire."))
                );
            } elseif ($administrator['email'] == '') {
                return new Response(json_encode(
                                $this->generateError("L'email est obligatoire."))
                );
            } elseif ($administrator['password'] == '') {
                return new Response(json_encode(
                                $this->generateError("Le mot de passe est obligatoire."))
                );
            } elseif ($administrator['checkPassword'] == '') {
                return new Response(json_encode(
                                $this->generateError("La vérification du mot de passe est obligatoire."))
                );
            }

            // Vérification de la cohérence mot de passe
            if ($administrator['checkPassword'] != $administrator['password']) {
                return new Response(json_encode(
                                $this->generateError("Les mots de passe ne sont pas identiques."))
                );
            }

            // Mise à jour de la session
            $session->set('administrator', $administrator);
        }

        return new Response(json_encode(array('error' => false)));
    }

    /**
     * Gère les données renvoyées par le formulaire base de données
     * @return Response
     */
    public function checkDataBaseAction() {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {

            // Récupération de la session
            $session = $this->get('session');

            // Récupération des données du formulaire
            $parameters = $this->getDataRequest($request);

            // Vérification des champs obligatoires
            if ($parameters['dataBaseHost'] == '') {
                return new Response(json_encode(
                                $this->generateError("L'adresse de la base de donnée est obligatoire."))
                );
            } elseif ($parameters['dataBaseName'] == '') {
                return new Response(json_encode(
                                $this->generateError("Le nom de la base de la base de donnée est obligatoire."))
                );
            } elseif ($parameters['dataBaseUser'] == '') {
                return new Response(json_encode(
                                $this->generateError("L'utilisateur de la base de donnée est obligatoire."))
                );
            }

            // Vérification des informations de connection à la BDD
            $checDatabase = $this->checkDataBaseConnection($parameters);
            if ($checDatabase['error']) {
                return new Response(json_encode(
                                $this->generateError($checDatabase['message']))
                );
            }

            // Génération du fichier parameters.yml
            $parametersFile = $this->generateParametersFile($parameters);
            $resultWriting = $this->writeParametersFile($parametersFile);

            if ($resultWriting['error']) {
                return new Response(json_encode($resultWriting));
            }
        }

        return new Response(json_encode(array('error' => false)));
    }

    /**
     * Gère les données renvoyées par le formulaire boutique
     * @return Response
     */
    public function checkShopAction() {
        $request = $this->get('request');
        if ($request->isXmlHttpRequest()) {

            // Récupération de la session
            $session = $this->get('session');

            // Récupération des données du formulaire
            $shop = $this->getDataRequest($request);

            // Vérification des champs obligatoires
            if ($shop['name'] == '') {
                return new Response(json_encode(
                                $this->generateError("Le nom de la boutique est obligatoire."))
                );
            }

            // Mise à jour de la session
            $session->set('shop', $shop);
        }

        return new Response(json_encode(array('error' => false)));
    }

    /**
     * Met les données de la requête dans un tableau
     * @param Request $request
     * @return array
     */
    private function getDataRequest(Request $request) {
        foreach ($request->request as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }

    /**
     * Vérifie les paramètres de connection à la BDD
     * @param array $parameters
     * @return array
     */
    private function checkDataBaseConnection(Array $parameters) {
        $dsn = 'mysql:host=' . $parameters['dataBaseHost'] . ';dbname=mysql';
        $user = $parameters['dataBaseUser'];
        $password = $parameters['dataBasePassword'];
        try {
            $bdd = new \PDO($dsn, $user, $password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            $bdd = null;
        } catch (\PDOException $e) {
            $bdd = null;
            return array('error' => true, 'message' => $e->getMessage());
        }
        return array('error' => false);
    }

    /**
     * Génère le contenu du fichier parameters.yml
     * @param array $parameters
     * @return Response A Response instance
     */
    private function generateParametersFile(Array $parameters) {
        return $this->render('UlysseDeploymentDeploymentBundle:Generate:parameters.yml.twig', array(
                    'parameters' => $parameters
        ));
    }

    /**
     * Execute les commandes d'initialisation de la BDD
     *      - doctrine:database:create
     *      - doctrine:schema:create
     *      - doctrine:fixtures:load --append --complete
     */
    private function execCommands() {
        $commands = array(
            array('command' => 'doctrine:database:create'),
            array('command' => 'doctrine:schema:create'),
//                array('command' => 'doctrine:fixtures:load', '--append' => true, '--complete' => true)
        );

        $kernel = $this->get('kernel');
        $application = new Application($kernel);
        $application->setAutoExit(false);

        foreach ($commands as $command) {
            $application->run(new ArrayInput($command));
        }
    }

    /**
     * Vérifie les droits puis écris sur le fichier parameters.yml
     * @param file $parametersFile
     * @return array
     */
    private function writeParametersFile($parametersFile) {
        $path = $this->container->getParameter('kernel.root_dir') . '/config/parameters.yml';
        // Vérification des droits d'écriture sur le fichier parameters.yml
        $perms = fileperms($path);
        if (!($perms & 0x0002)) {
            return $this->generateError("Impossible d'écrire dans le fichier app/config/parameters.yml."
                            . "<br> Merci de changer les droits en éxécutant la commande suivante :"
                            . "<br> chmod 777 " . $path
            );
        }
        // Ecriture
        $file = fopen($path, 'w+');
        fwrite($file, $parametersFile->getContent());
        fclose($file);

        return array('error' => false);
    }

    /**
     * Enregistre l'administrateur en BDD
     * @param array $administrator
     */
    private function insertAdministrator(Array $administrator) {
        $em = $this->getDoctrine()->getManager();

        // je Supprime les doublons potentiels avec le nouvel administrateur
        $rep = $em->getRepository('UlysseBusinessUserBundle:User');
        $usersSameMail = $rep->findBy(array('email' => $administrator['email']));
        if (count($usersSameMail)) {
            foreach ($usersSameMail as $userSameMail) {
                $em->remove($userSameMail);
            }
            $em->flush();
        }
        $usersSameUserName = $rep->findBy(array('username' => $administrator['username']));
        if (count($usersSameUserName)) {
            foreach ($usersSameUserName as $userSameUserName) {
                $em->remove($userSameUserName);
            }
            $em->flush();
        }

        // Insert le nouvel administrateur
        $admin = new User();
        $admin->setUsername($administrator['username']);
        $admin->setEmail($administrator['email']);
        $admin->setPlainPassword($administrator['password']);
        $admin->setRoles(array('ROLE_SUPER_ADMIN'));
        $admin->setEnabled(true);

        $em->persist($admin);
        $em->flush();
    }

    /**
     * Créé la nouvelle configuration
     * @param array $shop
     */
    private function createConfiguration(Array $shop) {
        $em = $this->getDoctrine()->getManager();

        // Vérifie si on configuration éxiste déjà
        $rep = $em->getRepository('UlysseBusinessConfigurationBundle:Configuration');
        $conf = $rep->find(1);

        // Supprime la configuration éxistante
        if ($conf) {
            $em->remove($conf);
            $em->flush();
        }
        
        // Créé la nouvelle configuration
        $conf = new Configuration();
        $conf->setId(1);
        $conf->setShopname($shop['name']);
        $conf->setDeployed(true);

        // Force le setId(1)
        $metadata = $em->getClassMetaData(get_class($conf));
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);

        $em->persist($conf);
        $em->flush();
    }

    /**
     * Génère la vue pour le message d'erreur
     * @param string $message
     * @return array
     */
    private function generateError($message) {
        return array(
            'error' => true,
            'message' => $this->render('UlysseDeploymentDeploymentBundle:Errors:index.html.twig', array(
                'error' => $message
            ))->getContent()
        );
    }

}
