<?php

class MovieCollection implements Countable
{

    protected $collection;

    public function add($movie)
    {
        if (is_array($movie)) {
            array_map([$this, 'add'], $movie);
        } else {
            $this->collection[] = $movie;
        }
    }

    public function count()
    {
        return count($this->collection);
    }

    public function clean()
    {
        unset($this->collection);
        $this->collection = [];
    }

    public function markAllAsWatched()
    {
        foreach ($this->collection as $movie) {
            $movie->watch();
        }

    }
}
