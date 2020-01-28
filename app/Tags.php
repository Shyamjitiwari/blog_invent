<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    public function blogs(){
        return $this->belongsToMany('App\Blog');
    }
}
