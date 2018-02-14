<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Calendar
 *
 * @ApiResource
 * @ORM\Table(name="calendar")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CalendarRepository")
 */
class Calendar
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="day", type="string", length=255, nullable=true)
     */
    private $day;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime", nullable=true)
     */
    private $end;

	/**
	 * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\announcement", mappedBy="calendar")
	 */
	protected $announcement;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Calendar
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set day
     *
     * @param string $day
     *
     * @return Calendar
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Calendar
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Calendar
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->announcement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add announcement
     *
     * @param \ApiBundle\Entity\announcement $announcement
     *
     * @return Calendar
     */
    public function addAnnouncement(\ApiBundle\Entity\announcement $announcement)
    {
        $this->announcement[] = $announcement;

        return $this;
    }

    /**
     * Remove announcement
     *
     * @param \ApiBundle\Entity\announcement $announcement
     */
    public function removeAnnouncement(\ApiBundle\Entity\announcement $announcement)
    {
        $this->announcement->removeElement($announcement);
    }

    /**
     * Get announcement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }
}
