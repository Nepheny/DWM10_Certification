<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function album()
    {
        return $this->hasMany('App\Album');
    }
}
