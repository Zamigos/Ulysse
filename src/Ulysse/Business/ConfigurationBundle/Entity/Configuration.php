<?php

namespace Ulysse\Business\ConfigurationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table(name="configuration")
 * @ORM\Entity
 */
class Configuration
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deployed", type="boolean")
     */
    private $deployed;

    /**
     * @var string
     *
     * @ORM\Column(name="shopname", type="string")
     */
    private $shopname;

    /**
     * @ORM\OneToOne(targetEntity="Ulysse\Business\ConfigurationBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $logo;

    /**
     * @var text
     *
     * @ORM\Column(name="legalnotice", type="text", nullable=true)
     */
    private $legalNotice;

    /**
     * Set id
     *
     * @param integer $id
     * @return Personalisation
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set deployed
     *
     * @param boolean $deployed
     * @return Configuration
     */
    public function setDeployed($deployed)
    {
        $this->deployed = $deployed;

        return $this;
    }

    /**
     * Get deployed
     *
     * @return boolean 
     */
    public function getDeployed()
    {
        return $this->deployed;
    }

    /**
     * Set shopname
     *
     * @param string $shopname
     * @return Configuration
     */
    public function setShopname($shopname)
    {
        $this->shopname = $shopname;

        return $this;
    }

    /**
     * Get shopname
     *
     * @return string 
     */
    public function getShopname()
    {
        return $this->shopname;
    }

    /**
     * Set logo
     *
     * @param \Ulysse\Business\ConfigurationBundle\Entity\Image $image
     * @return Configuration
     */
    public function setLogo(\Ulysse\Business\ConfigurationBundle\Entity\Image $image = null)
    {
        $this->logo = $image;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \Ulysse\Business\ConfigurationBundle\Entity\Image 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set legalNotice
     *
     * @param string $legalNotice
     * @return Configuration
     */
    public function setLegalNotice($legalNotice)
    {
        $this->legalNotice = $legalNotice;

        return $this;
    }

    /**
     * Get legalNotice
     *
     * @return string 
     */
    public function getLegalNotice()
    {
        return $this->legalNotice;
    }
}
