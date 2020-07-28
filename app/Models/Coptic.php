<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coptic extends Model
{
    protected $fillable = ['title','post','img','viewers','user_id'];


    public function comments(){

        return $this->hasMany(CopticComment::class, 'post_id');
    }
    public function Likes(){

        return $this->hasMany(CopticLike::class, 'post_id');
    }
}
