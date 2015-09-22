<?php

interface Connection
{
    function connect();
}

class DbConnection implements Connection
{
    function connect()
    {

    }
}

class PasswordReminder
{

    /**
     * @var Connection
     */
    private $connection;

    function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}
