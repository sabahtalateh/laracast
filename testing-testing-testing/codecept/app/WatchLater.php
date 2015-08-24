<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchLater extends Model
{
    protected $table = 'watch_later';

    protected $fillable = ['lesson_id'];
}
