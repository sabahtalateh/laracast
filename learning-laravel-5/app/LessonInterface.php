<?php

namespace App;

interface LessonInterface
{
    public function getTitle();

    public function getBody();

    public function getPublishedDate();
}