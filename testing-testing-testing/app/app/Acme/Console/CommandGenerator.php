<?php

namespace Acme\Console;

use Illuminate\Filesystem\Filesystem;
use Mustache_Engine;

class CommandGenerator
{
    private $file;
    private $mustache;

    function __construct(Filesystem $file, Mustache_Engine $mustache)
    {
        $this->file = $file;
        $this->mustache = $mustache;
    }

    public function make(CommandInput $input, $template, $destination)
    {
        $template = $this->file->get($template);
        $stub = $this->mustache->render($template, $input);

        $this->file->put($destination, $stub);
    }
}
