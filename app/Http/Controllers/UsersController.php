<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\User;
use App\Team;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth, Hash, Input, Validator, Redirect, Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        //
        return View::make('user.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = array(
            'name'      => 'required',
            'email'     => 'required|email',
            'password'              => 'min:5|confirmed',
            'password_confirmation' => 'required_with:password|min:5'
        );

        $validator = Validator::make(Input::all(), $rules);

        //process
        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/edit')
                ->withErrors($validator);
        }
        else {
            //store

            $user = User::find($id);
            $user->name             = Input::get('name');
            $user->first_name       = Input::get('first_name');
            $user->last_name        = Input::get('last_name');
            $user->email            = Input::get('email');
            $password               = Input::get('password');
            $user->password = Hash::make($password);

            $user->save();

            //redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('user/' . $id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function teams()
    {

        $current_user = Auth::user()->id;

        $teams = User::find($current_user)->teams->all();

        return View::make('user.teams')
            ->with('teams', $teams);
    }


}
