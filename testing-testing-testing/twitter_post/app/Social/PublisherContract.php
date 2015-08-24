<?php

namespace App\Social;

interface PublisherContract
{
    public function publish($status);
}