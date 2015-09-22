<?php

namespace Acme;

class VeggieSub extends Sub
{
    protected function addPrimaryToppings()
    {
        var_dump('adding veggies');
        return $this;
    }
}