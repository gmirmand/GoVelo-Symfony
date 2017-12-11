<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Verified
 *
 * @ORM\Table(name="verified")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\VerifiedRepository")
 */
class Verified
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
     * @ORM\Column(name="scan_id", type="string", length=535)
     */
    private $scanId;

    /**
     * @var string
     *
     * @ORM\Column(name="scan_rc", type="string", length=535)
     */
    private $scanRc;


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
     * Set scanId
     *
     * @param string $scanId
     *
     * @return Verified
     */
    public function setScanId($scanId)
    {
        $this->scanId = $scanId;

        return $this;
    }

    /**
     * Get scanId
     *
     * @return string
     */
    public function getScanId()
    {
        return $this->scanId;
    }

    /**
     * Set scanRc
     *
     * @param string $scanRc
     *
     * @return Verified
     */
    public function setScanRc($scanRc)
    {
        $this->scanRc = $scanRc;

        return $this;
    }

    /**
     * Get scanRc
     *
     * @return string
     */
    public function getScanRc()
    {
        return $this->scanRc;
    }
}

