<?php

require "vendor/autoload.php";

interface Logger
{
    public function log($data);
}

class LogToFile implements Logger
{

    public function log($data)
    {
        var_dump('log to a file.');
    }
}

class LogToDatabase implements Logger
{

    public function log($data)
    {
        var_dump('log to the database');
    }
}

class LogToXWebServer implements Logger
{

    public function log($data)
    {
        var_dump('log to saas');
    }
}

class App
{
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile;

        $logger->log($data);
    }
}

(new App)->log('Some data', new LogToXWebServer);
