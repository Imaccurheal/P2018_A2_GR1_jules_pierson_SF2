<?php
/*
 * TODO
 * link tag entity to article entity in bilateral way
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tag")
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TagRepository")
 */
class Tag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var Article
     *
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tag")
     */
    private $article;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add article
     *
     * @param Article $article
     * @return Tag
     */
    public function addArticle(Article $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param Article $article
     */
    public function removeArticle(Article $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return ArrayCollection
     */
    public function getArticle()
    {
        return $this->article;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
