<?php

namespace Acme;


class Kindle implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('turn the Kindle on');
    }

    public function pressNext()
    {
        var_dump('press the next button on the Kindle');
    }
}
