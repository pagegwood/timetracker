@extends('layouts.master')

@section('ng-app', '')
@section('ng-controller', '')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">

					<h1>{{ $project->name }}</h1>

					{{ $project->description }}

					<h4>Tasks</h4>
					<ul>
						@foreach($project->tasks as $task)
						<li>
							{{ $task->name }}
						</li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="well">

					<h4>Add a Task</h4>

					{!! HTML::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'tasks')) !!}

			        <!-- name -->
			        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('name', 'Name') !!}
				        {!! Form::text('name', null, ['class' => 'form-control']) !!}
				      </div>

				      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {!! Form::label('description', 'Description') !!}
				        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
				      </div>

			        {!! Form::submit('Add Task', ['class'=> 'btn btn-lg btn-primary']) !!}

			    {!! Form::close() !!}


				</div>
			</div>
		</div>


@endsection
