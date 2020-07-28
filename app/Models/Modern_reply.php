<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Modern_reply extends Model
{
    protected $table='modern_replies';

    protected $fillable = ['comment_id','post_id','user_id','reply'];


    public function comments(){

        return $this->belongsTo(ModernComment::class);
    }

    public function user(){

        return $this->belongsToMany(User::class );

    }
}
