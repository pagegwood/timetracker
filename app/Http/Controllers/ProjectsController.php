<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Project;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth, Input, Validator, Redirect, Session;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // get all the projects
        $teams = Project::all();

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
        return View::make('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'name'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('projects/create')
                ->withErrors($validator);
        } else {
            // store
            $project = new Project;
            $project->name       = Input::get('name');
            $project->description = Input::get('description');
            $project->user_id  = Auth::user()->id;

            $project->save();

            // redirect
            Session::flash('message', 'Successfully created Project!');
            return Redirect::to('user/projects');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $project = Project::find($id);
        //
        return View::make('projects.edit')
            ->with('project', $project);
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
        //
        //
        $rules = array(
            'name'      => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        //process
        if ($validator->fails()) {
            return Redirect::to('project/' . $id . '/edit')
                ->withErrors($validator);
        }
        else {
            //store

            $project = Project::find($id);
            $project->name             = Input::get('name');
            $project->description      = Input::get('description');

            $project->save();

            //redirect
            Session::flash('message', 'Successfully updated project!');
            return Redirect::to('user/projects');
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
        $project = Project::find($id);
        $project->delete();
        Session::flash('message', 'Successfully deleted your project.');
        return Redirect::to('user/projects');
    }
}
