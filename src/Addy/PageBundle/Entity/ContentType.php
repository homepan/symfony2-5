<?php

namespace Addy\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentType
 *
 * @ORM\Table(name="content_type")
 * @ORM\Entity
 */
class ContentType
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
