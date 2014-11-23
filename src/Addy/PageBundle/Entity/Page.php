<?php

namespace Addy\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @Orm\MappedSuperclass
 */
class Page
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;
    
    /**
    * @ORM\Column(type="string", length=255, nullable=false)
    * @Assert\NotBlank()
    */
    private $slug;
    
    /**
     * @ORM\OneToOne(targetEntity="Addy\PageBundle\Entity\Page", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $parent;
    
    /**
    * @ORM\ManyToOne(targetEntity="Addy\PageBundle\Entity\ContentType", inversedBy="contentType")
    * @ORM\JoinColumn(name="content_type_id", referencedColumnName="id", nullable=false)
    */
    private $contentType;
    
    /**
     * @ORM\Column(name="is_published", type="boolean", nullable=false)
     */
    private $isPublished;
    
    /**
     * @ORM\Column(name="is_approved", type="boolean", nullable=false)
     */
    private $isApproved;
    
    /**
     * @ORM\Column(name="status", type="string")
     */
    private $status;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime")
     */
    private $modified;
    
    public static function getStatusChoices()
    {
        $array = array(
            'ACTIVE',
            'INACTIVE',
            'DELETED',
            'ARCHIVED',
        );
        return array_combine($array, $array);
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
     * @return Page
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
     * Set slug
     *
     * @param string $slug
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
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
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Page
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get isPublished
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set isApproved
     *
     * @param boolean $isApproved
     * @return Page
     */
    public function setIsApproved($isApproved)
    {
        $this->isApproved = $isApproved;

        return $this;
    }

    /**
     * Get isApproved
     *
     * @return boolean 
     */
    public function getIsApproved()
    {
        return $this->isApproved;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Page
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Page
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Page
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set parent
     *
     * @param \Addy\PageBundle\Entity\Page $parent
     * @return Page
     */
    public function setParent(\Addy\PageBundle\Entity\Page $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Addy\PageBundle\Entity\Page 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set contentType
     *
     * @param \Addy\PageBundle\Entity\ContentType $contentType
     * @return Page
     */
    public function setContentType(\Addy\PageBundle\Entity\ContentType $contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Get contentType
     *
     * @return \Addy\PageBundle\Entity\ContentType 
     */
    public function getContentType()
    {
        return $this->contentType;
    }
}
