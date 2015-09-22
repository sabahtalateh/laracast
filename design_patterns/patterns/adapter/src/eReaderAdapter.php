<?php

namespace Acme;


class eReaderAdapter implements BookInterface
{
    private $eReader;

    function __construct(eReaderInterface $kindle)
    {
        $this->eReader = $kindle;
    }

    public function open()
    {
        return $this->eReader->turnOn();
    }

    public function turnPage()
    {
        return $this->eReader->pressNext();
    }
}