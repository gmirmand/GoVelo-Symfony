<?php

namespace ApiBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"getAnnouncement", "getUser", "getRental"}},
 *     "denormalization_context"={"groups"={"writeAnnouncement", "writeUser"}}
 * })
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseUser {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"getAnnouncement", "writeAnnouncement", "getUser", "getRental"})
	 */
	protected $id;
    
    /**
     * @Groups({"getUser", "writeUser"})
     */
    protected $email;
    
    /**
     * @Groups({"getUser", "writeUser"})
     */
    protected $username;
    
    /**
     * @Groups({"writeUser"})
     */
    protected $plainPassword;
    
    /**
     * @Groups({"writeUser"})
     */
    protected $enabled;
    
    /**
     * @ORM\Column(type="string")
     * @Groups({"getAnnouncement", "writeUser", "getUser", "getRental"})
     */
    protected $firstname;
    
    /**
	 * @ORM\Column(type="string")
     * @Groups({"getAnnouncement", "writeUser", "getUser", "getRental"})
	 */
    protected $lastname;
    
    /**
	 * @ORM\Column(type="string", nullable=true)
     * @Groups({"getAnnouncement", "writeUser", "getUser", "getRental"})
	 */
    protected $phone;
    
    /**
	 * @ORM\Column(type="date")
     * @Groups({"getAnnouncement", "writeUser", "getRental"})
	 */
    protected $birth;
    
    /**
	 * @ORM\Column(type="string", nullable=true)
     * @Groups({"getAnnouncement", "writeUser", "getRental"})
	 */
    protected $picture;
    
    /**
	 * @ORM\Column(type="integer")
     * @Groups({"getAnnouncement", "writeUser", "getRental"})
	 */
    protected $sexe;

	/**
	 * @ORM\OneToMany(targetEntity="ApiBundle\Entity\announcement", mappedBy="author")
	 * @ORM\JoinColumn(name="author_id", referencedColumnName="id", unique=true)
	 * @ApiSubresource
	 */
	public $announcement;

	/**
	 * @ORM\OneToOne(targetEntity="ApiBundle\Entity\Verified", inversedBy="user")
	 * @ORM\JoinColumn(name="verified_id", referencedColumnName="id" ,nullable=true)
     * @Groups({"getAnnouncement", "getRental"})
	 */
	private $verified;
    
    
    /**
	 * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Rental", mappedBy="owner")
	 */
	public $rental_owner;
    
    
    /**
	 * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Rental", mappedBy="renter")
	 */
	public $rental_renter;
    
    /**
	 * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Comment", mappedBy="author")
      * @Groups("getUser")
	 */
	public $comment_author;
    
    
    /**
	 * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Comment", mappedBy="receiver")
     * @Groups("getUser")
	 */
	public $comment_receiver;
    
    
	public function __construct() {
		parent::__construct();
		$this->comment_receiver = new \Doctrine\Common\Collections\ArrayCollection();
		$this->comment_author = new \Doctrine\Common\Collections\ArrayCollection();
	}

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set birth
     *
     * @param \DateTime $birth
     *
     * @return User
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get birth
     *
     * @return \DateTime
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
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
     * Set sexe
     *
     * @param integer $sexe
     *
     * @return User
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return integer
     */
    public function getSexe()
    {
        return $this->sexe;
    }
    
    public function getVerified() //: Verified 
    {
        /*if ($this->verified) {
            
            $id = $this->verified->getId(); 

            if ($id) {
                $return = true; 
            }else {
                $return = false; 
            }
        } else {
            $return = false; 
        }
        return $return; */
        return $this->verified;
    }
    
    /**
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\medal", inversedBy="user")
     * @ORM\JoinColumn(name="medal_id", referencedColumnName="id" ,nullable=true)
     * @Groups({"getUser"})
     */
    private $medal;

    public function getMedal()
    {
        return $this->medal;
    }
    

    /**
     * Set announcement
     *
     * @param string $announcement
     *
     * @return User
     */
    public function setAnnouncement($announcement)
    {
        $this->announcement = $announcement;

        return $this;
    }

    /**
     * Get announcement
     *
     * @return string
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }

    /**
     * Set verified
     *
     * @param \ApiBundle\Entity\Verified $verified
     *
     * @return User
     */
    public function setVerified(\ApiBundle\Entity\Verified $verified = null)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Add medal
     *
     * @param \ApiBundle\Entity\medal $medal
     *
     * @return User
     */
    public function addMedal(\ApiBundle\Entity\medal $medal)
    {
        $this->medal[] = $medal;

        return $this;
    }

    /**
     * Remove medal
     *
     * @param \ApiBundle\Entity\medal $medal
     */
    public function removeMedal(\ApiBundle\Entity\medal $medal)
    {
        $this->medal->removeElement($medal);
    }
}
