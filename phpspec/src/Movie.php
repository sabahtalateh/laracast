<?php

class Movie
{
    protected $rating;
    protected $watched = false;
    protected $title;

    function __construct($title)
    {
        $this->title = $title;
    }


    public function watch()
    {
        $this->watched = true;
    }

    public function isWatched()
    {
        return $this->watched;
    }

    public function setRating($rating)
    {
        $this->guardRatingRange($rating);

        $this->rating = $rating;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function guardRatingRange($rating)
    {
        if ($rating > 5) throw new InvalidArgumentException;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
