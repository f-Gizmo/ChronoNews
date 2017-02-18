<?php

namespace FG\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Newsletter
 *
 * @ORM\Table(name="newsletter")
 * @ORM\Entity(repositoryClass="FG\NewsBundle\Repository\NewsletterRepository")
 */
class Newsletter
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="refdd", type="string", length=10, nullable=true)
     */
    private $refdd;

    /**
     * @var string
     *
     * @ORM\Column(name="dealComment", type="string", length=255, nullable=true)
     */
    private $dealComment;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Newsletter
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Newsletter
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Newsletter
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set refdd
     *
     * @param string $refdd
     *
     * @return Newsletter
     */
    public function setRefdd($refdd)
    {
        $this->refdd = $refdd;

        return $this;
    }

    /**
     * Get refdd
     *
     * @return string
     */
    public function getRefdd()
    {
        return $this->refdd;
    }

    /**
     * Set dealComment
     *
     * @param string $dealComment
     *
     * @return Newsletter
     */
    public function setDealComment($dealComment)
    {
        $this->dealComment = $dealComment;

        return $this;
    }

    /**
     * Get dealComment
     *
     * @return string
     */
    public function getDealComment()
    {
        return $this->dealComment;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Newsletter
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

