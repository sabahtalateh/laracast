<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model implements LessonInterface
{
    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getPublishedDate()
    {
        return $this->published_at;
    }
}
