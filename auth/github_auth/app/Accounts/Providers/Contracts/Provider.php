<?php

namespace App\Accounts\Providers\Contracts;

interface Provider
{
    public function authorize();

    public function login($code);
}