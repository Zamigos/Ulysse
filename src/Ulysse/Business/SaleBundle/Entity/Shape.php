<?php

namespace Ulysse\Business\SaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shape
 *
 * @ORM\Table(name="shape", uniqueConstraints={@ORM\UniqueConstraint(name="libel_UNIQUE", columns={"wording"})})
 * @ORM\Entity
 */
class Shape
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
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;


    /**
     * toString
     * @return string
     */
    public function __toString()
    {
        return $this->getWording();
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
     * @return Shape
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
     * Set active
     *
     * @param boolean $active
     * @return Shape
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
}
