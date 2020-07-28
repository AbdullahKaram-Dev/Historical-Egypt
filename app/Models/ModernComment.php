<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ModernComment extends Model
{
    protected $table='modern_comments';

    protected $fillable = ['post_id','user_id','comment'];


    public function replies(){

        return $this->hasMany(Modern_reply::class);
    }
    public function posts(){

        return $this->belongsTo(Modern::class );
    }
    public function user(){

        return $this->belongsToMany(User::class);

    }
}
