<?php

class CustomerIsGoldTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function a_customer_is_gold_if_it_has_a_respective_type()
    {
        $specification = new \Acme\CustomerIsGold;
        $goldCustomer = new \Acme\Customer(['plan' => 'gold']);
        $silverCustomer = new \Acme\Customer(['plan' => 'silver']);

        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }
}