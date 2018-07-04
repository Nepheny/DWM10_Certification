<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
