<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class IslamicComment extends Model
{
    protected $table= 'islamic_comments';

    protected $fillable = ['id','post_id','user_id','comment'];


    public function replies(){

        return $this->hasMany(Islamic_reply::class);
    }

    public function posts(){

        return $this->belongsTo(Islamic::class );
    }
    public function user(){

        return $this->belongsToMany(User::class );

    }

}
