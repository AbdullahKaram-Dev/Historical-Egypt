<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharaonic extends Model
{
    protected $fillable = ['title','post','img','viewers','user_id'];


    public function comments(){

        return $this->hasMany(PharaonicComment::class, 'post_id');
    }
    public function Likes(){

        return $this->hasMany(PharaonicLike::class, 'post_id');
    }
}






