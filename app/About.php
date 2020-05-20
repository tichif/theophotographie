<?php

namespace App;

use Parsedown;

class About extends Model
{
    //
    protected $fillable = ['name', 'type', 'text', 'image', 'thumb'];

    public function getExcerptAttribute()
    {
        return $this->excerpt(50);
    }

    public function excerpt($length)
    {
        return str_limit(strip_tags($this->bodyHtml()), $length);
    }

    public function bodyHtml()
    {
        return Parsedown::instance()->text($this->text);
    }

    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml);
    }
}
