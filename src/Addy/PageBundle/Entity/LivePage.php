<?php

namespace Addy\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LivePage
 * @Orm\MappedSuperclass
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Addy\PageBundle\Entity\LivePageRepository")
 */
class LivePage extends Page
{

    /**
     * @ORM\OneToMany(targetEntity="Addy\PageBundle\Entity\Content", mappedBy="page", cascade="persist")
     */
    private $contents;
    
     public function __construct()
    {
        $this->contents = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Remove contents
     *
     * @param \Homepan\PageBundle\Entity\Content $contents
     */
    public function removeContent(\Addy\PageBundle\Entity\Content $contents)
    {
        $this->contents->removeElement($contents);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContents()
    {
        return $this->contents;
    }
}
