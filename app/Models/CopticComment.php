<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;


class CopticComment extends Model
{
    protected $table='coptic_comments';


    protected $fillable = ['post_id','user_id','comment'];


    public function replies(){

        return $this->hasMany(Coptic_reply::class);
    }

    public function posts(){

        return $this->belongsTo(Coptic::class );
    }

    public function user(){

        return $this->belongsToMany(\App\User::class);

    }

}
