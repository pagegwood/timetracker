@extends('layouts.master')

@section('ng-app', '')
@section('ng-controller', '')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">

					<h1>Edit {{ $project->name }}</h1>

					{!! HTML::ul($errors->all()) !!}

					{!! Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT')) !!}

		        <!-- name -->
		        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			        {!! Form::label('name', 'Project Name') !!}
			        {!! Form::text('name', null, ['class' => 'form-control']) !!}
			      </div>

			      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			        {!! Form::label('description', 'Project Description') !!}
			        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			      </div>

		        {!! Form::submit('Update Project', ['class'=> 'btn btn-lg btn-primary']) !!}

			    {!! Form::close() !!}

				</div>
			</div>
		</div>


@endsection
