@extends('layouts.master')

@section('ng-app', '')
@section('ng-controller', '')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">

					<h1>{{ $task->name }}</h1>

					@foreach($task->projects as $project)
						<h4>Project: {{ $project->name }}</h4>
					@endforeach

					{{ $task->description }}

				</div>
			</div>
		</div>


@endsection
