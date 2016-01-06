@extends('layouts.master')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">
					@if(count($teams) > 0)

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<td>ID</td>
								<td>Name</td>
								<td>Manage</td>
							</tr>
						</thead>
						<tbody>
							@foreach($teams as $key => $value)
								<tr>
									<td>{{ $value->id }}</td>
									<td>{{ $value->name }}</td>
									<td>
									{!! Form::open(array('url' => 'teams/' . $value->id, 'class' => 'u-display-inline')) !!}
                  {!! Form::hidden('_method', 'DELETE') !!}
	                    {!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger')) !!}
	                {!! Form::close() !!}
										<a class="btn btn-sm btn-success" href="{{ URL::to('teams/' . $value->id) }}">View</a>

										<a class="btn btn-sm btn-info" href="{{ URL::to('teams/' . $value->id . '/edit') }}">Edit</a>

									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					@endif

					<a class="btn btn-primary" href="{{ url('/teams/create') }}">Create a New Team</a>
				</div>
			</div>
		</div>

@endsection
