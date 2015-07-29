<?php

namespace App;


class Catalog
{
    public function getAll()
    {
        $lessons = Lesson::all();
        $episodes = Episode::all();

        $lessons = $lessons->toBase()->merge($episodes);

        return $lessons;

    }
}