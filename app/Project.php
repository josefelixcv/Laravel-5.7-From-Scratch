<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'owner_id'
    ];

    //protected $guarded = [];


    public function tasks() {
        return $this->hasMany(Task::class);
    }

    /*public function addTask($description) {
        Task::create([
            'project_id' => $this->id,
            'description' => $description
        ]);
    }*/

    public function addTask($task) {
        $this->tasks()->create($task);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }

}
