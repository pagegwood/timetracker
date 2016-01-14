<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = "tasks";

    // An array of the fields we can fill in the teams table
    protected $fillable = ['id', 'user_id', 'description', 'name', 'slug', 'created_at', 'updated_at'];

    protected $hidden = ['user_id'];

    // Eloquent relationship that says one user manages the Project
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project')->withTimestamps();
    }


    /**
    * Get a list of the teams with IDs
    *
    * @return array
    */

    public function getProjectListAttribute()
    {
        return $this->projects->lists('id');
    }

}
