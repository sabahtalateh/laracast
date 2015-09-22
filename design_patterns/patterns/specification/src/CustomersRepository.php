<?php

namespace Acme;


class CustomersRepository
{
    protected $customers;

    public function all()
    {
        return Customer::all();
    }

    public function whoMatch($specification)
    {
        $customers = Customer::query();

        $customers = $specification->asScope($customers);

        return $customers->get();
    }
}