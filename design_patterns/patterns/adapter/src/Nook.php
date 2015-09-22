<?php

namespace Acme;


class Nook implements eReaderInterface
{

    public function turnOn()
    {
        var_dump('turn on the Nook');
    }

    public function pressNext()
    {
        var_dump('press next button on the Nook');
    }
}