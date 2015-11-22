@extends('layouts.master')

@section('ng-app', '')
@section('ng-controller', '')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">

					<h1>Create Project</h1>

					{!! HTML::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'projects')) !!}

			        <!-- name -->
			        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('name', 'Project Name') !!}
				        {!! Form::text('name', null, ['class' => 'form-control']) !!}
				      </div>

				      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('description', 'Project Description') !!}
				        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
				      </div>

			        {!! Form::submit('Create Project', ['class'=> 'btn btn-lg btn-primary']) !!}

			    {!! Form::close() !!}

				</div>
			</div>
		</div>


@endsection
