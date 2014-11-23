<?php
/** @Entity **/
class Product
{
    // ...

    /**
     * @OneToOne(targetEntity="Shipping")
     * @JoinColumn(name="shipping_id", referencedColumnName="id")
     **/
    private $shipping;

    // ...
}

/** @Entity **/
class Shipping
{
    // ...
}