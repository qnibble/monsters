@extends('_partials.admin')

@section('content')
	<section>
		<div class="panel panel-info">
			<div class="panel-heading">
				<label>Abilities ({{ count($abilities) }})</label>
				<span class="pull-right">
					<a href="{{ url('ability/create') }}" class="btn btn-primary">+ Add</a>
				</span>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Range</th>
							<th>Effects</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($abilities as $ability)
							<tr>
								<td>{{ $ability->id }}</td>
								<td>{{ $ability->name }}</td>
								<td>{{ $ability->range }}</td>
								<td>{{ count($ability->effects) }}</td>
								<td><a href="{{ url('ability/' . $ability->id) }}" class="btn btn-info">View</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
@stop