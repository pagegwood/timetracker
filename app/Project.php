<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = "projects";

    // An array of the fields we can fill in the teams table
    protected $fillable = ['id', 'user_id', 'description', 'name', 'slug', 'created_at', 'updated_at'];

    protected $hidden = ['user_id'];

    // Eloquent relationship that says one user manages the Project
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function teams()
    {
    	return $this->belongsToMany('App\Team')->withTimestamps();
    }


    /**
    * Get a list of the teams with IDs
    *
    * @return array
    */

    public function getTeamListAttribute()
    {
        return $this->teams->lists('id');
    }

}
