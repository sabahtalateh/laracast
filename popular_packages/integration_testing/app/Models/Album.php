<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name',
        'artist_id'
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function artist()
    {
        $this->belongsTo(Artist::class);
    }

    public function getTotalLength()
    {
        return $this->songs()->sum('length');
    }
}
