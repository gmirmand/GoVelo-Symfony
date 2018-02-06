<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * announcement
 *
 * @ORM\Table(name="announcement")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\announcementRepository")
 */
class announcement
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
     * @ORM\Column(name="picture", type="string", length=535, nullable=true)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="price_h", type="integer", nullable=true)
     */
    private $priceH;

    /**
     * @var int
     *
     * @ORM\Column(name="price_d", type="integer", nullable=true)
     */
    private $priceD;

    /**
     * @var int
     *
     * @ORM\Column(name="price_w", type="integer", nullable=true)
     */
    private $priceW;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=535, nullable=true)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="lock_code", type="string", length=255, nullable=true)
     */
    private $lockCode;


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
     * Set picture
     *
     * @param string $picture
     *
     * @return announcement
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return announcement
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
     * Set priceH
     *
     * @param integer $priceH
     *
     * @return announcement
     */
    public function setPriceH($priceH)
    {
        $this->priceH = $priceH;

        return $this;
    }

    /**
     * Get priceH
     *
     * @return int
     */
    public function getPriceH()
    {
        return $this->priceH;
    }

    /**
     * Set priceD
     *
     * @param integer $priceD
     *
     * @return announcement
     */
    public function setPriceD($priceD)
    {
        $this->priceD = $priceD;

        return $this;
    }

    /**
     * Get priceD
     *
     * @return int
     */
    public function getPriceD()
    {
        return $this->priceD;
    }

    /**
     * Set priceW
     *
     * @param integer $priceW
     *
     * @return announcement
     */
    public function setPriceW($priceW)
    {
        $this->priceW = $priceW;

        return $this;
    }

    /**
     * Get priceW
     *
     * @return int
     */
    public function getPriceW()
    {
        return $this->priceW;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return announcement
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return announcement
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set lockCode
     *
     * @param string $lockCode
     *
     * @return announcement
     */
    public function setLockCode($lockCode)
    {
        $this->lockCode = $lockCode;

        return $this;
    }

    /**
     * Get lockCode
     *
     * @return string
     */
    public function getLockCode()
    {
        return $this->lockCode;
    }
    
    /**
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="announcements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;
    
    public function getAuthor()//: User
    {
        
        $return = array (
            "email" => $this->author->getEmail(),
            "firstname" => $this->author->getFirstname(),
            "lastname" => $this->author->getLastname(),
            "birth" => $this->author->getBirth(),
            "phone" => $this->author->getPhone(),
            "picture" => $this->author->getPicture(),
        );
        
        
        return $return;
        //return $this->author;
    }
}

