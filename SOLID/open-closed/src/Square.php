<?php

namespace Acme;


class Square implements ShapeInterface
{
    public $width;
    public $height;

    function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}