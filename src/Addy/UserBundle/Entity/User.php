<?php

namespace Addy\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Addy\UserBundle\Entity\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $role;
    
    public function __construct()
    {     
        
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
     * Set role
     *
     * @param \Addy\UserBundle\Entity\Role $role
     * @return Page
     */
    public function setContentType(\Addy\UserBundle\Entity\Role $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Addy\UserBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }
}
