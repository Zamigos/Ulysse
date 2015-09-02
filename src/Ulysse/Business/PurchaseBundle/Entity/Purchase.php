<?php

namespace Ulysse\Business\PurchaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Purchase
 *
 * @ORM\Table(name="purchase", indexes={@ORM\Index(name="fk_purchase_user1_idx", columns={"user"}) })
 * @ORM\Entity(repositoryClass="Ulysse\Business\PurchaseBundle\Entity\PurchaseRepository")
 */
class Purchase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;


    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Ulysse\Business\PurchaseBundle\Entity\Salepurchase", mappedBy="purchase")
     *
     */
    private $salepurchase;


    /**
     * @var
     *
     * @ORM\Column(name="firstname", type="string", length=100, nullable=false)
     */
    private $firstname;

    /**
     * @var
     *
     * @ORM\Column(name="lastname", type="string", length=100, nullable=false)
     */
    private $lastname;

    /**
     * @var
     *
     * @ORM\Column(name="address", type="string", length=100, nullable=false)
     */
    private $address;

    /**
     * @var
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=false)
     */
    private $cp;

    /**
     * @var
     *
     * @ORM\Column(name="city", type="string", length=100, nullable=false)
     */
    private $city;

    /**
     * @var
     *
     * @ORM\Column(name="country", type="string", length=100, nullable=false)
     */
    private $country;

    /**
     * @var
     *
     * @ORM\Column(name="amount_total", type="float", nullable=false)
     */
    private $amount_total;

    /**
     * @var boolean
     *
     * @ORM\Column(name="payed", type="boolean", nullable=true)
     */
    private $payed;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Ulysse\Business\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->salepurchase = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Purchase
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Set user
     *
     * @param \Ulysse\Business\UserBundle\Entity\User $user
     * @return Purchase
     */
    public function setUser(\Ulysse\Business\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ulysse\Business\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add salepurchase
     *
     * @param \Ulysse\Business\PurchaseBundle\Entity\Salepurchase $salepurchase
     * @return Purchase
     */
    public function addSalepurchase(\Ulysse\Business\PurchaseBundle\Entity\Salepurchase $salepurchase)
    {
        $this->salepurchase[] = $salepurchase;

        return $this;
    }

    /**
     * Remove salepurchase
     *
     * @param \Ulysse\Business\PurchaseBundle\Entity\Salepurchase $salepurchase
     */
    public function removeSalepurchase(\Ulysse\Business\PurchaseBundle\Entity\Salepurchase $salepurchase)
    {
        $this->salepurchase->removeElement($salepurchase);
    }

    /**
     * Get salepurchase
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSalepurchase()
    {
        return $this->salepurchase;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Purchase
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Purchase
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Purchase
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set cp
     *
     * @param $cp
     * @return Purchase
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return \int 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Purchase
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Purchase
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set amount_total
     *
     * @param float $amountTotal
     * @return Purchase
     */
    public function setAmountTotal($amountTotal)
    {
        $this->amount_total = $amountTotal;

        return $this;
    }

    /**
     * Get amount_total
     *
     * @return float 
     */
    public function getAmountTotal()
    {
        return $this->amount_total;
    }

    /**
     * Set payed
     *
     * @param boolean $payed
     * @return Purchase
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * Get pay
     *
     * @return boolean 
     */
    public function getPayed()
    {
        return $this->payed;
    }
}
