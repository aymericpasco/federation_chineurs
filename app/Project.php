<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function owner() {
        return $this->belongsTo('App\Team', 'owner_id');
    }

    public function collaborators() {
        return $this->belongsToMany('App\Team', 'collaborator_project', 'project_id', 'collaborator_id');
    }

    public function todos() {
        return $this->hasMany('App\Todo', 'project_id', 'id');
    }

    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }
}


