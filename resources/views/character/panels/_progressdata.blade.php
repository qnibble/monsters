<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title">Progress Data</h4>
	</div>
	<div class="panel-body">
		<div class="col-sm-6">
			<table class="table">
				<thead>
					<tr>
						<th>Level</th>
						<th>Exp Needed</th>
					</tr>
				</thead>
				<tbody>
					@if(isset($character))
						@for($index = 0; $index < count($character->progress_data[0]->progress_matrix); $index++)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{ $character->progress_data[0]->progress_matrix[$index] }}</td>
							</tr>
						@endfor
					@else
						@for($index = 0; $index < 10; $index++)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>
									{!! Form::text('level_data', null, ['class' => 'form-control']) !!}
								</td>
							</tr>
						@endfor
					@endif
				</tbody>
			</table>
		</div>
		<div class="col-sm-6">
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if(isset($character))
						<tr>
							<td>Tier 1</td>
							<td>{{ $character->progress_data[0]->tier1 }}</td>
						</tr>
						<tr>
							<td>Tier 2</td>
							<td>{{ $character->progress_data[0]->tier2 }}</td>
						</tr>
						<tr>
							<td>Tier 3</td>
							<td>{{ $character->progress_data[0]->tier3 }}</td>
						</tr>
					@else
						<tr>
							<td>Tier 1</td>
							<td><a href="#" class="btn btn-info btn-xs">Set</a></td>
						</tr>
						<tr>
							<td>Tier 2</td>
							<td><a href="#" class="btn btn-info btn-xs">Set</a></td>
						</tr>
						<tr>
							<td>Tier 3</td>
							<td><a href="#" class="btn btn-info btn-xs">Set</a></td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>