<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Islamic_reply extends Model
{
    protected $table='islamic_replies';

    protected $fillable = ['comment_id','post_id','user_id','reply'];

    public function comments(){

        return $this->belongsTo(IslamicComment::class);
    }

    public function user(){

        return $this->belongsToMany(User::class );

    }


}
