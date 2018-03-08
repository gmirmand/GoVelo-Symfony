<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 *
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"getAnnouncement", "getRental"}},
 *     "denormalization_context"={"groups"={"writeAnnouncement, writeRental"}}
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
     * @Groups({"getAnnouncement", "getRental", "writeRental"})
	 */
	private $id;

	/**
	 * @var string
     * @Groups({"getAnnouncement", "writeAnnouncement"})
	 * @ORM\Column(name="title", type="text", nullable=true)
	 */
	private $title;
    
    /**
	 * @var string
     * @Groups({"getAnnouncement", "writeAnnouncement"})
	 * @ORM\Column(name="picture", type="string", length=535, nullable=true)
	 */
	private $picture;
    
	/**
	 * @var string
     * @Groups({"getAnnouncement", "writeAnnouncement"})
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;


	/**
	 * @var int
	 * @Groups({"getAnnouncement", "writeAnnouncement"})
	 * @ORM\Column(name="price_d", type="integer", nullable=true)
	 */
	private $priceD;


	/**
	 * @var string
	 * @Groups({"getAnnouncement", "writeAnnouncement"})
	 * @ORM\Column(name="city", type="string", length=255)
	 */
	private $city;

	/**
	 * @var string
	 * @Groups({"getAnnouncement", "writeAnnouncement"})
	 * @ORM\Column(name="adress", type="string", length=535, nullable=true)
	 */
	private $adress;

	/**
	 * @var string
	 * @Groups({"getAnnouncement", "writeAnnouncement"})
	 * @ORM\Column(name="lock_code", type="string", length=255, nullable=true)
	 */
	private $lockCode;

	/**
	 * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="announcement", cascade={"persist"})
	 * @ORM\JoinColumn(name="author_id", referencedColumnName="id" ,nullable=false)
     * @Groups({"getAnnouncement", "writeAnnouncement"})
	 */
	private $author;

	/**
	 * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Calendar", inversedBy="announcement", cascade={"persist"})
	 * @ORM\JoinColumn(name="calendar_id", referencedColumnName="id" ,nullable=true)
     * @Groups({"getAnnouncement", "writeAnnouncement"})
     * 
	 */
	private $calendar;
    
    
    /**
	 * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\Style", inversedBy="announcement", cascade={"persist"})
	 * @ORM\JoinColumn(name="style_id", referencedColumnName="id" ,nullable=false)
     * @Groups({"getAnnouncement", "writeAnnouncement"})
	 */
	private $style;
    
    
    /**
	 * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Rental", mappedBy="announcement", cascade={"persist"})
	 */
	private $rental;


	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
    
    /**
	 * Get title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}
    
    
    /**
	 * Set title
	 *
	 * @param string $title
	 *
	 * @return announcement
	 */
	public function setTitle( $title ) {
		$this->title = $title;

		return $this;
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
    
    
    /**
	 * Add style
	 *
	 * @param \ApiBundle\Entity\Style $style
	 *
	 * @return announcement
	 */
	public function addStyle( \ApiBundle\Entity\Style $style ) {
		$this->style[] = $style;

		return $this;
	}

	/**
	 * Remove style
	 *
	 * @param \ApiBundle\Entity\Style $style
	 */
	public function removeStyle( \ApiBundle\Entity\Style $style ) {
		$this->style->removeElement( $style );
	}

	/**
	 * Get style
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getStyle() {
		return $this->style;
	}
}
