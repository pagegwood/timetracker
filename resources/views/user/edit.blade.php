@extends('layouts.master')

@section('ng-app', '')
@section('ng-controller', '')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">

					<h1>Edit Profile</h1>

					{!! HTML::ul($errors->all()) !!}

					{!! Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) !!}

			        <!-- name -->
			        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('name', 'Display Name') !!}
				        {!! Form::text('name', null, ['class' => 'form-control']) !!}
				      </div>

				      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('name', 'First Name') !!}
				        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
			      	</div>

			      	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('name', 'Last Name') !!}
				        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
				      </div>

			        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('email', 'Email') !!}
				        {!! Form::email('email', null, ['class' => 'form-control']) !!}
				      </div>

				      <div class="form-group">
				      	<div class="checkbox">
						      <label><input type="checkbox" aria-label="Update Password" data-toggle="collapse" data-target="#updatePassword" aria-expanded="false" aria-controls="updatePassword"> Update Password</label>
						    </div>
							</div>

							<div class="collapse" id="updatePassword">
								<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					        {!! Form::label('password', 'New Password') !!}
					        {!! Form::password('password', ['class' => 'form-control']) !!}
					      </div>

					      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					        {!! Form::label('password_confirmation', 'Confirm New Password') !!}
					        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
					      </div>
							</div>

			        {!! Form::submit('Update Profile', ['class'=> 'btn btn-lg btn-primary']) !!}

			    {!! Form::close() !!}

				</div>
			</div>
		</div>


@endsection
