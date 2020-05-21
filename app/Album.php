<?php

namespace App;



class Album extends Model
{
    protected $fillable = ['name', 'description'];

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }
}
