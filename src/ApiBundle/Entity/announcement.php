<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 *
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"test"}, "enable_max_depth"=true}
 * })
 * @ORM\Table(name="announcement")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\announcementRepository")
 */
class announcement {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups("test")
	 */
	private $id;

	/**
	 * @var string
     * @Groups("test")
	 * @ORM\Column(name="picture", type="string", length=535, nullable=true)
	 */
	private $picture;

	/**
	 * @var string
     * @Groups("test")
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * @var int
	 * @Groups("test")
	 * @ORM\Column(name="price_h", type="integer", nullable=true)
	 */
	private $priceH;

	/**
	 * @var int
	 * @Groups("test")
	 * @ORM\Column(name="price_d", type="integer", nullable=true)
	 */
	private $priceD;

	/**
	 * @var int
	 * @Groups("test")
	 * @ORM\Column(name="price_w", type="integer", nullable=true)
	 */
	private $priceW;

	/**
	 * @var string
	 * @Groups("test")
	 * @ORM\Column(name="city", type="string", length=255)
	 */
	private $city;

	/**
	 * @var string
	 * @Groups("test")
	 * @ORM\Column(name="adress", type="string", length=535, nullable=true)
	 */
	private $adress;

	/**
	 * @var string
	 * @Groups("test")
	 * @ORM\Column(name="lock_code", type="string", length=255, nullable=true)
	 */
	private $lockCode;

	/**
	 * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="announcement")
	 * @ORM\JoinColumn(name="author_id", referencedColumnName="id" ,nullable=false)
     * @Groups("test")
     * @MaxDepth(2000)
	 */
	private $author;

	/**
	 * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Calendar", inversedBy="announcement")
	 * @ORM\JoinColumn(name="calendar_id", referencedColumnName="id" ,nullable=true)
     * @Groups("test")
     * 
	 */
	private $calendar;


	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set picture
	 *
	 * @param string $picture
	 *
	 * @return announcement
	 */
	public function setPicture( $picture ) {
		$this->picture = $picture;

		return $this;
	}

	/**
	 * Get picture
	 *
	 * @return string
	 */
	public function getPicture() {
		return $this->picture;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return announcement
	 */
	public function setDescription( $description ) {
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set priceH
	 *
	 * @param integer $priceH
	 *
	 * @return announcement
	 */
	public function setPriceH( $priceH ) {
		$this->priceH = $priceH;

		return $this;
	}

	/**
	 * Get priceH
	 *
	 * @return int
	 */
	public function getPriceH() {
		return $this->priceH;
	}

	/**
	 * Set priceD
	 *
	 * @param integer $priceD
	 *
	 * @return announcement
	 */
	public function setPriceD( $priceD ) {
		$this->priceD = $priceD;

		return $this;
	}

	/**
	 * Get priceD
	 *
	 * @return int
	 */
	public function getPriceD() {
		return $this->priceD;
	}

	/**
	 * Set priceW
	 *
	 * @param integer $priceW
	 *
	 * @return announcement
	 */
	public function setPriceW( $priceW ) {
		$this->priceW = $priceW;

		return $this;
	}

	/**
	 * Get priceW
	 *
	 * @return int
	 */
	public function getPriceW() {
		return $this->priceW;
	}

	/**
	 * Set city
	 *
	 * @param string $city
	 *
	 * @return announcement
	 */
	public function setCity( $city ) {
		$this->city = $city;

		return $this;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Set adress
	 *
	 * @param string $adress
	 *
	 * @return announcement
	 */
	public function setAdress( $adress ) {
		$this->adress = $adress;

		return $this;
	}

	/**
	 * Get adress
	 *
	 * @return string
	 */
	public function getAdress() {
		return $this->adress;
	}

	/**
	 * Set lockCode
	 *
	 * @param string $lockCode
	 *
	 * @return announcement
	 */
	public function setLockCode( $lockCode ) {
		$this->lockCode = $lockCode;

		return $this;
	}

	/**
	 * Get lockCode
	 *
	 * @return string
	 */
	public function getLockCode() {
		return $this->lockCode;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->calendar = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Set author
	 *
	 * @param \ApiBundle\Entity\User $author
	 *
	 * @return announcement
	 */
	public function setAuthor( \ApiBundle\Entity\User $author ) {
		$this->author = $author;

		return $this;
	}

	/**
	 * Get author
	 *
	 * @return \ApiBundle\Entity\User
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Add calendar
	 *
	 * @param \ApiBundle\Entity\Calendar $calendar
	 *
	 * @return announcement
	 */
	public function addCalendar( \ApiBundle\Entity\Calendar $calendar ) {
		$this->calendar[] = $calendar;

		return $this;
	}

	/**
	 * Remove calendar
	 *
	 * @param \ApiBundle\Entity\Calendar $calendar
	 */
	public function removeCalendar( \ApiBundle\Entity\Calendar $calendar ) {
		$this->calendar->removeElement( $calendar );
	}

	/**
	 * Get calendar
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCalendar() {
		return $this->calendar;
	}
}
