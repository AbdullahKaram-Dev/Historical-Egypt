<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PharaonicComment extends Model
{
    protected $table = 'pharaonic_comments';

    protected $fillable = ['id','post_id','user_id','comment'];


    public function replies(){

        return $this->hasMany(Pharaonic_reply::class);
    }


    public function posts(){

        return $this->belongsTo(Pharaonic::class );
    }

    public function user(){

        return $this->belongsToMany(User::class);

    }

}


