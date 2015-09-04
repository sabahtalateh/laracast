<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  description
 * @property  title
 */
class Job extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];
}
