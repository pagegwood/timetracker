@extends('layouts.master')

@section('ng-app', '')
@section('ng-controller', '')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">

					<h1>Edit {{ $task->name }}</h1>

					{!! HTML::ul($errors->all()) !!}

					{!! Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) !!}

			        <!-- name -->
			        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('name', 'task Name') !!}
				        {!! Form::text('name', null, ['class' => 'form-control']) !!}
				      </div>

				      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('description', 'task Description') !!}
				        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
				      </div>

				      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('project_list', 'Projects') !!}
				        {!! Form::select('project_list[]', $projects, $task->projects->lists('id')->all(), ['class' => 'form-control']) !!}
				      </div>

			        {!! Form::submit('Update task', ['class'=> 'btn btn-lg btn-primary']) !!}

			    {!! Form::close() !!}

				</div>
			</div>
		</div>


@endsection
