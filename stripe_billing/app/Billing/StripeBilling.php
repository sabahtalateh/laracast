<?php

namespace App\Billing;

use Illuminate\Support\Facades\Config;
use Mockery\CountValidator\Exception;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Error\Authentication;
use Stripe\Error\Card;
use Stripe\Stripe;

class StripeBilling implements BillingInterface
{
    function __construct()
    {
        Stripe::setApiKey(Config::get('stripe.secret_key'));
    }

    public function charge(array $data)
    {
        try
        {
            $customer = Customer::create([
                'card'        => $data[ 'token' ],
                'description' => $data[ 'email' ]
            ]);

            Charge::create([
                'customer' => $customer->id,
                'amount'   => 1000, // $10
                'currency' => 'usd',
            ]);

            return $customer->id;
        }
        catch (Card $e)
        {
            // Since it's a decline, \Stripe\Error\Card will be caught
            throw new Exception($e->getMessage());
        }
        catch (Authentication $e)
        {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            throw new Exception($e->getMessage());
        }
    }
}