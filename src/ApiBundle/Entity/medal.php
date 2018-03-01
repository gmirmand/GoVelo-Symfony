<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * medal
 *
 * @ApiResource
 * @ApiResource(attributes={
     *     "normalization_context"={"groups"={"getUser"}},
     *     "denormalization_context"={"groups"={"writeUser"}}
     * })
 * @ORM\Table(name="medal")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\medalRepository")
 */
class medal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"getUser"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_medal", type="string", length=255)
     * @Groups({"getUser"})
     */
    private $nameMedal;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_medal", type="string", length=500)
     * @Groups({"getUser"})
     */
    private $descMedal;

    /**
     * @var string
     *
     * @ORM\Column(name="img_medal", type="string", length=500)
     * @Groups({"getUser"})
     */
    private $imgMedal;

	/**
	 * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\User", mappedBy="medal")
	 */
	protected $user;


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
     * Set nameMedal
     *
     * @param string $nameMedal
     *
     * @return medal
     */
    public function setNameMedal($nameMedal)
    {
        $this->nameMedal = $nameMedal;

        return $this;
    }

    /**
     * Get nameMedal
     *
     * @return string
     */
    public function getNameMedal()
    {
        return $this->nameMedal;
    }

    /**
     * Set descMedal
     *
     * @param string $descMedal
     *
     * @return medal
     */
    public function setDescMedal($descMedal)
    {
        $this->descMedal = $descMedal;

        return $this;
    }

    /**
     * Get descMedal
     *
     * @return string
     */
    public function getDescMedal()
    {
        return $this->descMedal;
    }

    /**
     * Set imgMedal
     *
     * @param string $imgMedal
     *
     * @return medal
     */
    public function setImgMedal($imgMedal)
    {
        $this->imgMedal = $imgMedal;

        return $this;
    }

    /**
     * Get imgMedal
     *
     * @return string
     */
    public function getImgMedal()
    {
        return $this->imgMedal;
    }
}

