@extends('_partials.admin')

@section('content')
	<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
				Maps ({{ count($maps) }})
				<span class="pull-right">
					<a class="btn btn-default btn-xs" href="{{ url('mapdata/create') }}">+ Add</a>
				</span>
			</div>

			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th># of Allies</th>
							<th># of Enemies</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($maps as $map)
							<tr>
								<td>{{ $map->id }}</td>
								<td>{{ $map->name }}</td>
								<td>{{ count($map->ally_data) }}</td>
								<td>{{ count($map->enemy_data) }}</td>
								<td><a href="{{ url('mapdata/' . $map->id) }}" class="btn btn-info">View</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
@stop