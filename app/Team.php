<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    protected $table = "teams";

    // An array of the fields we can fill in the teams table
    protected $fillable = ['id', 'user_id', 'description', 'name', 'slug', 'created_at', 'updated_at'];

    protected $hidden = ['user_id'];

    // Eloquent relationship that says one user manages the team
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Eloquent reloationship listing projects belonging to a team
    public function projects()
    {
    	return $this->belongsToMany('App\Project')->withTimestamps();
    }

     /**
    * Get a list of the projects with IDs
    *
    * @return array
    */

    public function getProjectListAttribute()
    {
        return $this->projects->lists('id');
    }

}
