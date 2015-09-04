<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name',
        'length',
        'album_id'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
