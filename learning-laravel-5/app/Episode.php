<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model implements LessonInterface
{
    protected $fillable = [
        'title',
        'excerpt',
        'position'
    ];

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->excerpt;
    }

    public function getPublishedDate()
    {
        return $this->updated_at;
    }
}
