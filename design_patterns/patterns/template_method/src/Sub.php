<?php

namespace Acme;


/**
 * Class Sub
 * @package Acme
 */
abstract class Sub
{
    /**
     * @return mixed
     */
    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    /**
     * @return $this
     */
    protected function layBread()
    {
        var_dump('laying bread');
        return $this;
    }

    /**
     * @return $this
     */
    protected function addLettuce()
    {
        var_dump('adding lettuce');
        return $this;
    }

    /**
     * @return $this
     */
    protected function addSauces()
    {
        var_dump('adding sauces');
        return $this;
    }

    /**
     * @return $this
     */
    protected abstract function addPrimaryToppings();
}