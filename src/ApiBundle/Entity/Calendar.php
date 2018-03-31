<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Algolia\AlgoliaSearchBundle\Mapping\Annotation as Algolia;



/**
 * Calendar
 *
 * @ApiResource
 * @ApiResource(attributes={
     *     "normalization_context"={"groups"={"getAnnouncement"}},
     *     "denormalization_context"={"groups"={"writeAnnouncement"}}
     * })
 * @ORM\Table(name="calendar")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CalendarRepository")
 */
class Calendar
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"getAnnouncement", "writeAnnouncement"})
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Groups({"getAnnouncement"})
     * @ORM\Column(name="start", type="datetime", nullable=true)
     * @Algolia\Attribute(algoliaName="startCalendar")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @Groups({"getAnnouncement"})
     * @ORM\Column(name="end", type="datetime", nullable=true)
     * @Algolia\Attribute(algoliaName="endCalendar")
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
