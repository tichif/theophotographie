<?php

namespace App;


class Photo extends Model
{
    protected $fillable = ['name', 'size', 'type', 'image', 'thumb'];

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }
}
