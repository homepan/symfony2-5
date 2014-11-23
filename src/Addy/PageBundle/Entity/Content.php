<?php

namespace Addy\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * Content
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Addy\PageBundle\Entity\ContentRepository")
 */
class Content
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
     * @ORM\ManyToOne(targetEntity="Addy\PageBundle\Entity\LivePage", inversedBy="page")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $page;


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
     * Set page
     *
     * @param \Addy\PageBundle\Entity\LivePage $page
     * @return Content
     */
    public function setPage(\Addy\PageBundle\Entity\LivePage $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Addy\PageBundle\Entity\LivePage 
     */
    public function getPage()
    {
        return $this->page;
    }
}
