<?php

namespace Acme;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
    protected $fillable = [
        'name',
        'plan'
    ];

    public function plan()
    {
        return $this->plan;
    }
}