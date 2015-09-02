<?php

namespace Ulysse\Business\PurchaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salepurchase
 *
 * @ORM\Table(name="sale_purchase", indexes={@ORM\Index(name="fk_salepurchase_sale1_idx", columns={"sale"},  )})
 * @ORM\Entity(repositoryClass="Ulysse\Business\PurchaseBundle\Entity\SalepurchaseRepository")
 */
class Salepurchase
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
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var \Sale
     *
     * @ORM\ManyToOne(targetEntity="Ulysse\Business\SaleBundle\Entity\Sale", inversedBy="salepurchase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sale", referencedColumnName="id")
     * })
     */
    private $sale;


    /**
     * @var \Status
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \Rating
     *
     * @ORM\OneToOne(targetEntity="Rating", inversedBy="salepurchase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rating", referencedColumnName="id")
     * })
     */
    private $rating;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="statusdate", type="datetime", nullable=false)
     */
    private $statusdate;

    /**
     * @var \Purchase
     *
     * @ORM\ManyToOne(targetEntity="Purchase", inversedBy="salepurchase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="purchase", referencedColumnName="id")
     * })
     */
    private $purchase;

    /**
     *
     * @ORM\Column(name="amount", type="float", nullable=false)
     */
    private $amount;

    /**
     * Set statusdate
     *
     * @param \DateTime $statusdate
     * @return Purchase
     */
    public function setStatusdate($statusdate)
    {
        $this->statusdate = $statusdate;

        return $this;
    }

    /**
     * Get statusdate
     *
     * @return \DateTime
     */
    public function getStatusdate()
    {
        return $this->statusdate;
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
     * Set quantity
     *
     * @param integer $quantity
     * @return Salepurchase
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set sale
     *
     * @param \Ulysse\Business\SaleBundle\Entity\Sale $sale
     * @return Salepurchase
     */
    public function setSale(\Ulysse\Business\SaleBundle\Entity\Sale $sale = null)
    {
        $this->sale = $sale;

        return $this;
    }

    /**
     * Get sale
     *
     * @return \Ulysse\Business\SaleBundle\Entity\Sale 
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Set status
     *
     * @param \Ulysse\Business\PurchaseBundle\Entity\Status $status
     * @return Purchase
     */
    public function setStatus(\Ulysse\Business\PurchaseBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Ulysse\Business\PurchaseBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set rating
     *
     * @param \Ulysse\Business\PurchaseBundle\Entity\Rating $rating
     * @return Purchase
     */
    public function setRating(\Ulysse\Business\PurchaseBundle\Entity\Rating $rating = null)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return \Ulysse\Business\PurchaseBundle\Entity\Rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set purchase
     *

     */
    public function setPurchase(\Ulysse\Business\PurchaseBundle\Entity\Purchase $purchase = null)
    {
        $this->purchase = $purchase;

        return $this;
    }

    /**
     * Get purchase
     *
     */
    public function getPurchase()
    {
        return $this->purchase;
    }


    /**
     * Set amount
     *
     * @param float $amount
     * @return Salepurchase
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
