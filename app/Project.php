<?php

namespace App;

use App\Events\ProjectCreated;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Mail;
//use App\Mail\ProjectCreated;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'owner_id'
    ];

    protected $dispatchesEvents = [
        'created' => ProjectCreated::class
    ];
    

    //protected $guarded = [];

    /*protected static function boot() {
        parent::boot();
        //created updated deleted
        static::created(function ($project) {
    
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
    
        });
    } */  


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
