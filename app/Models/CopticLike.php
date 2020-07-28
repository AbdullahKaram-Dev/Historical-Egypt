<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopticLike extends Model
{
    protected $table='coptic_likes';

    protected $fillable = ['post_id','user_id', 'like'];




    public function posts(){

        return $this->belongsTo(Coptic::class );
    }

    public function user(){

        return $this->belongsToMany(\App\User::class);

    }
}
