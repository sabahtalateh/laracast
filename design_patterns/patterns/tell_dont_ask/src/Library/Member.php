<?php

namespace Acme\Library;


class Member
{
    protected $books = [];

    public function checkOut($book, Library $library)
    {
        $library->checkOut($book);
        $this->books[ ] = $book;


    }

    public function books()
    {
        return $this->books;
    }
}
