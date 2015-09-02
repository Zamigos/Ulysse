<?php

namespace Ulysse\Business\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag", uniqueConstraints={@ORM\UniqueConstraint(name="libel_UNIQUE", columns={"wording"})})
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="wording", type="string", length=45, nullable=false)
     */
    private $wording;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="tag")
     */
    private $product;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->wording;
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
     * Set wording
     *
     * @param string $wording
     * @return Tag
     */
    public function setWording($wording)
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * Get wording
     *
     * @return string 
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * Add product
     *
     * @param \Ulysse\Business\ProductBundle\Entity\Product $product
     * @return Tag
     */
    public function addProduct(\Ulysse\Business\ProductBundle\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Ulysse\Business\ProductBundle\Entity\Product $product
     */
    public function removeProduct(\Ulysse\Business\ProductBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
