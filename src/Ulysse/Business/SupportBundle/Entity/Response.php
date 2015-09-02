<?php

namespace Ulysse\Business\SupportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ulysse\Business\UserBundle\Entity\User;

/**
 * Response
 *
 * @ORM\Table(name="response", indexes={@ORM\Index(name="fk_response_user1_idx", columns={"user"}), @ORM\Index(name="fk_response_ticket1_idx", columns={"ticket"})})
 * @ORM\Entity
 */
class Response
{

    public function __construct()
    {
        $this->seen = false;
        $this->answered = false;
        $this->date = new \DateTime();
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
     * @var \Ticket
     *
     * @ORM\ManyToOne(targetEntity="Ulysse\Business\SupportBundle\Entity\Ticket", inversedBy="response")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket", referencedColumnName="id")
     * })
     */
    private $ticket;

    /**
     * @var boolean
     *
     * @ORM\Column(name="seen", type="boolean", nullable=false, options={"default" = 0})
     */
    private $seen;

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
     * Set content
     *
     * @param string $content
     * @return Response
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
     * @return Response
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
     * @return Response
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
     * Set user
     *
     * @param User $user
     * @return Response
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set ticket
     *
     * @param \Ulysse\Business\SupportBundle\Entity\Ticket $ticket
     * @return Response
     */
    public function setTicket(\Ulysse\Business\SupportBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \Ulysse\Business\SupportBundle\Entity\Ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }
}
