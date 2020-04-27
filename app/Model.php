<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

class Model extends BaseModel
{
    // cancel the default incrementing in authentication by Laravel
    public $incrementing = false;

    protected static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }
}