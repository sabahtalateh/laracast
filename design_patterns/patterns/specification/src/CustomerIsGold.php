<?php

namespace Acme;


class CustomerIsGold
{
    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->plan() == 'gold';
    }

    public function asScope($query)
    {
        return $query->where('plan', 'gold');
    }
}