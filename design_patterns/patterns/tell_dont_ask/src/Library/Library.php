<?php

namespace Acme\Library;


class Library
{
    /**
     * @var BookCollection
     */
    protected $books;

    function __construct(BookCollection $books)
    {
        $this->books = $books;
    }

    public function books()
    {
        return $this->books;
    }

    public function checkOut($book)
    {
        $this->books = $this->books()->remove($book);
    }
}