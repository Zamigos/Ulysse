<?php

namespace Ulysse\Business\SupportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="fk_ticket_user1_idx", columns={"user"})})
 * @ORM\Entity(repositoryClass="Ulysse\Business\SupportBundle\Entity\TicketRepository")
 */
class Ticket
{

    public function __construct()
    {
        $this->seen = false;
        $this->answered = false;
        $this->date = new \DateTime();
        $this->response = new ArrayCollection();
    }

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
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

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
     * @var \Response
     *
     * @ORM\OneToMany(targetEntity="Ulysse\Business\SupportBundle\Entity\Response", mappedBy="ticket")
     */
    private $response;

    /**
     * @var boolean
     *
     * @ORM\Column(name="seen", type="boolean", nullable=false, options={"default" = 0})
     */
    private $seen;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fenced", type="boolean", nullable=false, options={"default" = 0})
     */
    private $fenced;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return (string) $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Ticket
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Ticket
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Ticket
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
     * Set seen
     *
     * @param boolean $seen
     * @return Ticket
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;

        return $this;
    }

    /**
     * Get seen
     *
     * @return boolean 
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * Set fenced
     *
     * @param boolean $fenced
     * @return Ticket
     */
    public function setFenced($fenced)
    {
        $this->fenced = $fenced;

        return $this;
    }

    /**
     * Get fenced
     *
     * @return boolean 
     */
    public function getFenced()
    {
        return $this->fenced;
    }

    /**
     * Set user
     *
     * @param \Ulysse\Business\UserBundle\Entity\User $user
     * @return Ticket
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
     * Add response
     *
     * @param \Ulysse\Business\SupportBundle\Entity\Response $response
     * @return Ticket
     */
    public function addResponse(\Ulysse\Business\SupportBundle\Entity\Response $response)
    {
        $this->response[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \Ulysse\Business\SupportBundle\Entity\Response $response
     */
    public function removeResponse(\Ulysse\Business\SupportBundle\Entity\Response $response)
    {
        $this->response->removeElement($response);
    }

    /**
     * Get response
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponse()
    {
        return $this->response;
    }
}
