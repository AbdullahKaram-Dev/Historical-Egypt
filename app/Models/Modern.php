<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modern extends Model
{
    protected $fillable = ['title','post','img','viewers','user_id'];

    public function comments(){

        return $this->hasMany(ModernComment::class, 'post_id');
    }
    public function Likes(){

        return $this->hasMany(ModernLike::class, 'post_id');
    }
}
