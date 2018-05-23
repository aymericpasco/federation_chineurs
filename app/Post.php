<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function postable()
    {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
