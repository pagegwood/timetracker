<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Project;
use App\Team;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth, Input, Validator, Redirect, Session;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // get all the teams
        $teams = Team::all();

        return $teams;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $projects = Project::lists('name', 'id');
        return View::make('teams.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('teams/create')
                ->withErrors($validator);
        } else {
            // store
            $team = new Team;
            $team->name       = Input::get('name');
            $team->description = Input::get('description');
            $team->user_id  = Auth::user()->id;



            $team->save();
            $team->projects()->attach($request->input('project_list'));

            // redirect
            Session::flash('message', 'Successfully created team!');
            return Redirect::to('user/teams');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $team = Team::find($id);
        $projects = Project::lists('name', 'id');

        return View::make('teams.team', compact('team', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        $projects = Project::lists('name', 'id');
        //
        return View::make('teams.edit', compact('team', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = array(
            'name'      => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        //process
        if ($validator->fails()) {
            return Redirect::to('team/' . $id . '/edit')
                ->withErrors($validator);
        }
        else {
            //store

            $team = Team::find($id);
            $team->name             = Input::get('name');
            $team->description      = Input::get('description');
            $team->projects()->sync($request->input('project_list'));

            $team->save();


            //redirect
            Session::flash('message', 'Successfully updated team!');
            return Redirect::to('user/teams');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $team = Team::find($id);
        $team->delete();
        Session::flash('message', 'Successfully deleted your team.');
        return Redirect::to('user/teams');
    }
}
