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
 * @ApiResource
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;
    
    /**
	 * @ORM\Column(type="string")
	 */
    protected $lastname;
    
    /**
	 * @ORM\Column(type="string", nullable=true)
	 */
    protected $phone;
    
    /**
	 * @ORM\Column(type="date")
	 */
    protected $birth;
    
    /**
	 * @ORM\Column(type="string", nullable=true)
	 */
    protected $picture;
    
    /**
	 * @ORM\Column(type="integer")
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
	 */
	private $verified;

    
	public function __construct() {
		parent::__construct();
		// your own logic
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
        if ($this->verified) {
            
            $id = $this->verified->getId(); 

            if ($id) {
                $return = true; 
            }else {
                $return = false; 
            }
        } else {
            $return = false; 
        }
        return $return; 
    }
    
    /**
     * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\medal", inversedBy="user")
     * @ORM\JoinColumn(name="medal_id", referencedColumnName="id" ,nullable=true)
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
