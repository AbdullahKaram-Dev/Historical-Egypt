<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Coptic_reply extends Model
{
    protected $table='coptic_replies';

    protected $fillable = ['comment_id','post_id','user_id','reply'];

    public function comments(){

        return $this->belongsTo(CopticComment::class);
    }

    public function user(){

        return $this->belongsToMany(User::class);

    }

}
