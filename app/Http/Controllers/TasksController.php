<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\Task;

use Auth, Input, Validator, Redirect, Session;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return View::make('tasks.create', compact('projects'));
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
            return Redirect::to('tasks/create')
                ->withErrors($validator);
        } else {
            // store
            $task = new Task;
            $task->name       = Input::get('name');
            $task->description = Input::get('description');
            $task->user_id  = Auth::user()->id;



            $task->save();
            $task->projects()->attach($request->input('project_list'));

            // redirect
            Session::flash('message', 'Successfully created task!');
            return Redirect::to('user/tasks');
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

        $task = Task::find($id);
        //
        return View::make('tasks.details', compact('task'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $projects = Project::lists('name', 'id');
        //
        return View::make('tasks.edit', compact('task', 'projects'));
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
            return Redirect::to('task/' . $id . '/edit')
                ->withErrors($validator);
        }
        else {
            //store

            $task = Task::find($id);
            $task->name             = Input::get('name');
            $task->description      = Input::get('description');
            $task->projects()->sync($request->input('project_list'));

            $task->save();

            //redirect
            Session::flash('message', 'Successfully updated task!');
            return Redirect::to('user/tasks');
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
        $task = Task::find($id);
        $task->delete();
        Session::flash('message', 'Successfully deleted your task');
        return Redirect::to('user/tasks');
    }
}
