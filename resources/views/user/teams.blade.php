@extends('layouts.master')

@section('content')

		<div class="container">
			<div class="col-sm-8">
				<div class="well">


					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<td>ID</td>
								<td>Name</td>
								<td>Manage</td>
							</tr>
						</thead>
						<tbody>
							@if(isset($teams))
								@foreach($teams as $key => $value)
									<tr>
										<td>{{ $value->id }}</td>
										<td>{{ $value->name }}</td>
										<td>
										{!! Form::open(array('url' => 'teams/' . $value->id)) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
		                    {!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger')) !!}
		                {!! Form::close() !!}
											<a class="btn btn-small btn-success" href="{{ URL::to('teams/' . $value->id) }}">View</a>

											<a class="btn btn-small btn-info" href="{{ URL::to('teams/' . $value->id . '/edit') }}">Edit</a>

										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>

					<a class="Btn Btn-default" href="{{ url('/teams/create') }}">Create a New Team</a>
				</div>
			</div>
		</div>

@endsection
