<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Islamic extends Model
{
    protected $fillable = ['title','post','img','viewers','user_id'];

    public function comments(){

        return $this->hasMany(IslamicComment::class, 'post_id');
    }
    public function Likes(){

        return $this->hasMany(IslamicLike::class, 'post_id');
    }
}
