<?php

namespace App;



class Category extends Model
{
    protected $fillable = ['name'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
