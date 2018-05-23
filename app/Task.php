<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    public function todo() {
        return $this->belongsTo('App\Todo', 'todo_id');
    }
}
