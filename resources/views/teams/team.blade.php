@extends('layouts.master')

@section('ng-app', '')
@section('ng-controller', '')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">

					<h1>{{ $team->name }}</h1>

					<div class="Content">
						{{ $team->description }}
					</div>
					@if(count($team->projects))
					<h4>Projects</h4>
					<ul>
						@foreach($team->projects as $key)
							<li>{{ $key->name }}</li>
						@endforeach
					</ul>
					@endif
				</div>
			</div>
		</div>


@endsection
