<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Algolia\AlgoliaSearchBundle\Mapping\Annotation as Algolia;


/**
 * Style
 *
 * @ApiResource
 * @ApiResource(attributes={
     *     "normalization_context"={"groups"={"getAnnouncement"}},
     *     "denormalization_context"={"groups"={"writeAnnouncement"}}
     * })
 * @ORM\Table(name="style")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\StyleRepository")
 */
class Style
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"getAnnouncement", "writeAnnouncement"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="style", type="string", length=100)
     * @Groups({"getAnnouncement"})
     * @Algolia\Attribute(algoliaName="nomStyle")
     */
    private $style;
    
    
    /**
	 * @ORM\ManyToMany(targetEntity="ApiBundle\Entity\announcement", mappedBy="style")
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
     * Set style
     *
     * @param string $style
     *
     * @return Style
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }
}

