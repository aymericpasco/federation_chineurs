<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'team_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany('App\Project', 'owner_id', 'id');
    }

    public function collaborations()
    {
        return $this->belongsToMany('App\Project', 'collaborator_project', 'collaborator_id', 'project_id');
    }

}

//    public function posts()
//    {
//        r