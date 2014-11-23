<?php
/** @Entity **/
class Customer
{
    // ...

    /**
     * @OneToOne(targetEntity="Cart", mappedBy="customer")
     **/
    private $cart;

    // ...
}

/** @Entity **/
class Cart
{
    // ...

    /**
     * @OneToOne(targetEntity="Customer", inversedBy="cart")
     * @JoinColumn(name="customer_id", referencedColumnName="id")
     **/
    private $customer;

    // ...
}