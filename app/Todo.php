<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];

    public function project() {
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function tasks() {
        return $this->hasMany('App\Task', 'todo_id', 'id');
    }
}
