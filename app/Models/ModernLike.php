<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModernLike extends Model
{
    protected $fillable = ['post_id','user_id', 'like'];




    public function posts(){

        return $this->belongsTo(Modern::class );
    }

    public function user(){

        return $this->belongsToMany(\App\User::class);

    }
}
