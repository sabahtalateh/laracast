<?php

namespace App\Console\Commands;


use Illuminate\Filesystem\Filesystem;

class ModelGenerator
{
    protected $file;

    function __construct(Filesystem $file)
    {
        $this->file = $file;
    }

    public function make($model, $path)
    {
        $model = ucwords($model);
        $path = app_path() . "/{$path}/{$model}.php";

        $template = $this->getTemplate($model);
        $this->file->put($path, $template);
    }

    public function getTemplate($name)
    {
        $template = $this->file->get(__DIR__ . '/templates/model');

        return str_replace('{{NAME}}', $name, $template);
    }
}