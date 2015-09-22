<?php

namespace Acme;

class TurkeySub extends Sub
{
    protected function addPrimaryToppings()
    {
        var_dump('adding turkey');
        return $this;
    }
}