<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pharaonic_reply extends Model
{
    protected $fillable = ['comment_id','post_id', 'user_id','reply'];

    protected $table = 'pharaonic_replies';



    public function comments(){

        return $this->belongsTo(PharaonicComment::class);
    }

    public function user(){

        return $this->belongsToMany(User::class );

    }
}
