<?php

namespace Ulysse\Business\SaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sale
 *
 * @ORM\Table(name="sale", indexes={@ORM\Index(name="fk_sale_product1_idx", columns={"product"}), @ORM\Index(name="fk_sale_user1_idx", columns={"user"}), @ORM\Index(name="fk_sale_shape1_idx", columns={"shape"})})
 * @ORM\Entity(repositoryClass="Ulysse\Business\SaleBundle\Entity\SaleRepository")
 */
class Sale
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="text", nullable=true)
     */
    private $observation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="blocked", type="boolean", nullable=false, options={"default" = 0})
     */
    private $blocked;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Ulysse\Business\ProductBundle\Entity\Product", inversedBy="sale", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Ulysse\Business\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Shape
     *
     * @ORM\ManyToOne(targetEntity="Shape")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shape", referencedColumnName="id")
     * })
     */
    private $shape;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="date", nullable=true)
     */
    private $date_added;


    /**
     * @ORM\OneToOne(targetEntity="Ulysse\Business\SaleBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;
    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Ulysse\Business\PurchaseBundle\Entity\Salepurchase", mappedBy="sale")
     *
     */
    private $salepurchase;


    public function __construct()
    {
        $this->date_added = new \DateTime();
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
     * Set stock
     *
     * @param integer $stock
     * @return Sale
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Sale
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set observation
     *
     * @param string $observation
     * @return Sale
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string 
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set product
     *
     * @param \Ulysse\Business\ProductBundle\Entity\Product $product
     * @return Sale
     */
    public function setProduct(\Ulysse\Business\ProductBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Ulysse\Business\ProductBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set user
     *
     * @param \Ulysse\Business\UserBundle\Entity\User $user
     * @return Sale
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
     * Set shape
     *
     * @param \Ulysse\Business\SaleBundle\Entity\Shape $shape
     * @return Sale
     */
    public function setShape(\Ulysse\Business\SaleBundle\Entity\Shape $shape = null)
    {
        $this->shape = $shape;

        return $this;
    }

    /**
     * Get shape
     *
     * @return \Ulysse\Business\SaleBundle\Entity\Shape 
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * Set image
     *
     * @param \Ulysse\Business\SaleBundle\Entity\Image $image
     * @return Sale
     */
    public function setImage(\Ulysse\Business\SaleBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Ulysse\Business\SaleBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set date_added
     *
     * @param \DateTime $dateAdded
     * @return Sale
     */
    public function setDateAdded($dateAdded)
    {
        $this->date_added = $dateAdded;

        return $this;
    }

    /**
     * Get date_added
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Sale
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set blocked
     *
     * @param boolean $blocked
     * @return Sale
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * Get blocked
     *
     * @return boolean 
     */
    public function getBlocked()
    {
        return $this->blocked;
    }
}
