<?php

namespace App;



class Plan extends Model
{
    protected $fillable = ['name', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
