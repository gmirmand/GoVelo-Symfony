<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Comment
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"getUser", "getComment"}},
 *     "denormalization_context"={"groups"={"writeComment"}}
 * })
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"getUser", "getComment"})
     */
    private $id;

    /**
     * @var int
     *
     * @Groups({"getUser", "getComment", "writeComment"})
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var string
     * @Groups({"getUser", "getComment",  "writeComment"})
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    
    /**
	 * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="comment_author")
	 * @ORM\JoinColumn(name="id_author", referencedColumnName="id")
     * @Groups({"getUser", "getComment", "writeComment"})
	 */
	private $author;
    
     /**
	 * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="comment_receiver")
	 * @ORM\JoinColumn(name="id_receiver", referencedColumnName="id")
     * @Groups({"getUser", "getComment", "writeComment"})
	 */
	private $receiver;
    

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
     * Set note
     *
     * @param integer $note
     *
     * @return Comment
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}

