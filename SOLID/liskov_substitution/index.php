<?php

interface LessonRepo
{
    /**
     * Fetch all records
     *
     * @return array
     */
    public function getAll();
}

class FileLessonRepo implements LessonRepo
{
    public function getAll()
    {
        return [];
    }
}

class DbLessonsRepo implements LessonRepo
{
    public function getAll()
    {
        return Lesson::all();
    }
}

