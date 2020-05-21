<?php

namespace App;



class Option extends Model
{
    protected $fillable = ['name', 'plan_id'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
