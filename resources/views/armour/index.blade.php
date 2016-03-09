@extends('_partials.admin')

@section('content')
	<section class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<label>Armour ({{ count($armours) }})</label>
					<span class="pull-right">
						<a href="{{ url('armour/create') }}" class="btn btn-primary">+ Add</a>
					</span>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Armour Value</th>
								<th>Additional Effects</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($armours as $armour)
								<tr>
									<td>{{ $armour->id }}</td>
									<td>{{ $armour->name }}</td>
									<td>{{ $armour->armour_value }}</td>
									<td>{{ count($armour->effects) }}</td>
									<td><a href="{{ url('armour/' . $armour->id) }}" class="btn btn-info">View</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
@stop