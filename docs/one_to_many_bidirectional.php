<?php
use Doctrine\Common\Collections\ArrayCollection;

/** @Entity **/
class Product
{
    // ...
    /**
     * @OneToMany(targetEntity="Feature", mappedBy="product")
     **/
    private $features;
    // ...

    public function __construct() {
        $this->features = new ArrayCollection();
    }
}

/** @Entity **/
class Feature
{
    // ...
    /**
     * @ManyToOne(targetEntity="Product", inversedBy="features")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    private $product;
    // ...
}