<?php

namespace Acme\Library;


class BookCollection
{
    protected $books;

    function __construct($books)
    {
        $this->books = $books;
    }

    public function contains($book)
    {
        return in_array($book, $this->books);
    }

    public function remove($book)
    {
        if ( ! $this->contains($book)) {
            throw new \Exception("{$book} is not available.");
        }

        return new self(array_diff($this->books, [$book]));
    }
}