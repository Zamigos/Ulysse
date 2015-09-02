<?php

namespace Ulysse\Business\ProductBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="fk_product_user_idx", columns={"addedby"}), @ORM\Index(name="fk_product_category1_idx", columns={"category"})})
 * @ORM\Entity(repositoryClass="Ulysse\Business\ProductBundle\Entity\ProductRepository")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    private $state = 0;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Ulysse\Business\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="addedby", referencedColumnName="id")
     * })
     */
    private $addedby;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="product", cascade={"persist"})
     * @ORM\JoinTable(name="tag_product")
     */
    private $tag;

    /**
     * @ORM\OneToOne(targetEntity="Ulysse\Business\ProductBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * Relation inverse pour obtenir les "sales" liées à ce produit
     *
     * @ORM\OneToMany(targetEntity="Ulysse\Business\SaleBundle\Entity\Sale", mappedBy="product")
     */
    private $sale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="date", nullable=false)
     */
    private $date_added;

    /**
     * @var boolean
     *
     * @ORM\Column(name="selected", type="boolean", nullable=false)
     */
    private $selected = false;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new ArrayCollection();
        $this->sale = new ArrayCollection();
        $this->date_added = new \DateTime();
    }

    /**
     * toString
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set addedby
     *
     * @param \Ulysse\Business\UserBundle\Entity\User $addedby
     * @return Product
     */
    public function setAddedby(\Ulysse\Business\UserBundle\Entity\User $addedby = null)
    {
        $this->addedby = $addedby;

        return $this;
    }

    /**
     * Get addedby
     *
     * @return \Ulysse\Business\UserBundle\Entity\User 
     */
    public function getAddedby()
    {
        return $this->addedby;
    }

    /**
     * Set category
     *
     * @param \Ulysse\Business\ProductBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Ulysse\Business\ProductBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Ulysse\Business\ProductBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tag
     *
     * @param \Ulysse\Business\ProductBundle\Entity\Tag $tag
     * @return Product
     */
    public function addTag(\Ulysse\Business\ProductBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Ulysse\Business\ProductBundle\Entity\Tag $tag
     */
    public function removeTag(\Ulysse\Business\ProductBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set image
     *
     * @param \Ulysse\Business\ProductBundle\Entity\Image $image
     * @return Product
     */
    public function setImage(\Ulysse\Business\ProductBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Ulysse\Business\ProductBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Product
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Add sale
     *
     * @param \Ulysse\Business\SaleBundle\Entity\Sale $sale
     * @return Product
     */
    public function addSale(\Ulysse\Business\SaleBundle\Entity\Sale $sale)
    {
        $this->sale[] = $sale;

        return $this;
    }

    /**
     * Remove sale
     *
     * @param \Ulysse\Business\SaleBundle\Entity\Sale $sale
     */
    public function removeSale(\Ulysse\Business\SaleBundle\Entity\Sale $sale)
    {
        $this->sale->removeElement($sale);
    }

    /**
     * Get sale
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Set date_added
     *
     * @param \DateTime $dateAdded
     * @return Product
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
     * Set selected
     *
     * @param boolean $selected
     * @return Product
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;

        return $this;
    }

    /**
     * Get selected
     *
     * @return boolean 
     */
    public function getSelected()
    {
        return $this->selected;
    }
}
