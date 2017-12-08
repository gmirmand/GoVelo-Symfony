<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * medal
 *
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
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_medal", type="string", length=255)
     */
    private $nameMedal;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_medal", type="string", length=500)
     */
    private $descMedal;

    /**
     * @var string
     *
     * @ORM\Column(name="img_medal", type="string", length=500)
     */
    private $imgMedal;


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

