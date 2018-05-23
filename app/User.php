<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'team_id', 'provider', 'provider_id'
    ];

    protected $hidden = [
        'password', 'remember_token', 'activated',
    ];

    public function team_created()
    {
        return $this->hasOne('App\Team', 'creator_id');
    }

    public function team() {
        return $this->belongsTo('App\Team', 'team_id');
    }

    public function posts() {
        return $this->hasMany('App\Post', 'user_id', 'id');
    }



    public function hasTeam() {
        if (User::team()->exists()) {
            return true;
        }
        return false;
    }

    public function isTeamCreator() {
        if (User::team_created()->exists()) {
            return true;
        }
        return false;
    }

}
