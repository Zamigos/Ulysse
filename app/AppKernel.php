<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            //FOSUserBundle
            new FOS\UserBundle\FOSUserBundle(),
            //Redimensionnement des images
            new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),
            //Gravatar User
            new Ornicar\GravatarBundle\OrnicarGravatarBundle(),
            //Our Bundle
            new Ulysse\Business\ProductBundle\UlysseBusinessProductBundle(),
            //Slug
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Ulysse\Business\UserBundle\UlysseBusinessUserBundle(),
            new Ulysse\Business\SaleBundle\UlysseBusinessSaleBundle(),
            new Ulysse\Business\SupportBundle\UlysseBusinessSupportBundle(),
            new Ulysse\Business\PurchaseBundle\UlysseBusinessPurchaseBundle(),
            new Ulysse\Business\CartBundle\UlysseBusinessCartBundle(),
            new Ulysse\Core\BackBundle\UlysseCoreBackBundle(),
            new Ulysse\Core\FrontBundle\UlysseCoreFrontBundle(),
            new Ulysse\Deployment\DeploymentBundle\UlysseDeploymentDeploymentBundle(),
            new Ulysse\Business\ConfigurationBundle\UlysseBusinessConfigurationBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
