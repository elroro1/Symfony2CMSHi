<?php

namespace CMS\Bundle\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use CMSDoctrineExt\Mapping\Annotation as CMSDoctrineExt;

/**
 * CMS\Bundle\NewsBundle\Entity\News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="CMS\Bundle\NewsBundle\Entity\NewsRepository")
 */
class News
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     *
     * @CMSDoctrineExt\Sluggable
     */
    private $title;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="news")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *
     */
    protected $category;

    /**
     * @var text $body
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var string $file
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     *
     * @CMSDoctrineExt\File(dir="files")
     *
     * @Assert\Image(maxSize="600000000")
     */
    private $file;

    /**
     * @var boolean $file_delete
     *
     */
    public $file_delete = false;


    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=255)
     *
     * @CMSDoctrineExt\Slug()
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity="Tags")
     * @ORM\JoinTable(name="news_tags",
     *      joinColumns={@ORM\JoinColumn(name="news_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    protected $tags;
	
	public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection;
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set file
     *
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set category
     *
     * @param CMS\Bundle\NewsBundle\Entity\Category $category
     */
    public function setCategory(\CMS\Bundle\NewsBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return CMS\Bundle\NewsBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tags
     *
     * @param CMS\Bundle\NewsBundle\Entity\Tags $tags
     */
    public function addTags(\CMS\Bundle\NewsBundle\Entity\Tags $tags)
    {
        $this->tags[] = $tags;
    }
	
	/**
     * Set tags
     *
     * @param CMS\Bundle\NewsBundle\Entity\Tags $tags
     */
    public function setTags(\CMS\Bundle\NewsBundle\Entity\Tags $tags)
    {
        $this->tags[] = $tags;
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
    
}