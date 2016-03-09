@extends('_partials.admin')

@section('content')
	<section class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
				<label>Weapons ({{ count($weapons) }})</label>
				<span class="pull-right">
					<a href="{{ url('weapon/create') }}" class="btn btn-primary">+ Add</a>
				</span>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Damage</th>
							<th>Additional Effects</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($weapons as $weapon)
							<tr>
								<td>{{ $weapon->id }}</td>
								<td>{{ $weapon->name }}</td>
								<td>{{ $weapon->damage }}</td>
								<td>{{ count($weapon->effects) }}</td>
								<td><a href="{{ url('weapon/' . $weapon->id) }}" class="btn btn-info">View</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
@stop