<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $fillable = ['title', 'img', 'start', 'end', 'active', 'url'];

    public function scopeIsActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeShow($query)
    {
        return $query->where('active', 1)->whereRaw('NOW() BETWEEN `start` and `end`');
    }
}
