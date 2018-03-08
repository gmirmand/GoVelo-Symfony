<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Rental
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"getRental"}},
 *     "denormalization_context"={"groups"={"writeRental"}}
 * })
 * @ORM\Table(name="rental")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\RentalRepository")
 */
class Rental
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
     * @var \DateTime
     * @Groups({"getRental", "writeRental"})
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     * @Groups({"getRental", "writeRental"})
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @var int
     * @Groups({"getRental", "writeRental"})
     * @ORM\Column(name="price", type="integer")
     */
    private $price;
    
    
    /**
	 * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="rental_owner")
	 * @ORM\JoinColumn(name="id_owner", referencedColumnName="id")
     * @Groups({"getRental", "writeRental"})
	 */
	private $owner;
    
     /**
	 * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="rental_renter")
	 * @ORM\JoinColumn(name="id_renter", referencedColumnName="id")
     * @Groups({"getRental", "writeRental"})
	 */
	private $renter;
    
    /**
	 * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\announcement", inversedBy="rental")
	 * @ORM\JoinColumn(name="id_announcement", referencedColumnName="id")
     * @Groups({"getRental", "writeRental"})
	 */
	private $announcement;


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
     * @return Rental
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
     * @return Rental
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
     * Set price
     *
     * @param integer $price
     *
     * @return Rental
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
	 * Set owner
	 *
	 * @param \ApiBundle\Entity\User $owner
	 *
	 * @return Rental
	 */
	public function setOwner( \ApiBundle\Entity\User $owner ) {
		$this->owner = $owner;

		return $this;
	}

	/**
	 * Get owner
	 *
	 * @return \ApiBundle\Entity\User
	 */
	public function getOwner() {
		return $this->owner;
	}
    
    /**
	 * Set renter
	 *
	 * @param \ApiBundle\Entity\User $renter
	 *
	 * @return Rental
	 */
	public function setRenter( \ApiBundle\Entity\User $renter ) {
		$this->renter = $renter;

		return $this;
	}

	/**
	 * Get renter
	 *
	 * @return \ApiBundle\Entity\User
	 */
	public function getRenter() {
		return $this->renter;
	}
    
    
    /**
     * Set announcement
     *
     * @param string $announcement
     *
     * @return Rental
     */
    public function setAnnouncement($announcement)
    {
        $this->announcement = $announcement;

        return $this;
    }

    /**
     * Get announcement
     *
     * @return \ApiBundle\Entity\announcement
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }

    
}

