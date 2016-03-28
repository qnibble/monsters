@extends('_partials.admin')

@section('content')
	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tracker Type</th>
					<th>Tracker ID</th>
					<th>Matrix Entries</th>
					<th>Tier 1</th>
					<th>Tier 2</th>
					<th>Tier 3</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($all_progressions as $entry)
					<tr>
						<td>{{ $entry->id }}</td>
						<td>{{ $entry->tracker_type }}</td>
						<td>{{ $entry->tracker_id }}</td>
						<td>{{ count($entry->progress_matrix) }}</td>
						<td>{{ $entry->tier1 }}</td>
						<td>{{ $entry->tier2 }}</td>
						<td>{{ $entry->tier3 }}</td>
						<td><a href="{{ url('progression/' . $entry->id) }}" class="btn btn-info">View</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop