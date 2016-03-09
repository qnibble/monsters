<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4 class="panel-title">Character Info</h4>
			</div>
			<table class="table">
				<tbody>
					@if(isset($character))
						<tr>
							<td>Name</td>
							<td>{{ $character->name }}</td>
						</tr>
						<tr>
							<td>Biography</td>
							<td>{{ $character->biography }}</td>
						</tr>
					@else 
						<tr>
							<td>Name</td>
							<td>{!! Form::text('name', null, ['class' => 'form-control']) !!}</td>
						</tr>
						<tr>
							<td>Biography</td>
							<td>{!! Form::text('biography', null, ['class' => 'form-control']) !!}</td>
						</tr>
					@endif
				</tbody>
			</table>
				
			<table class="table">
				<thead>
					<tr>
						<th colspan="4">Level Info</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Starting Level</td>
						<td colspan="3">{{ isset($character) ?  $character->starting_lvl : null }}</td>
					</tr>
					<tr>
						<td>Current Level</td>
						<td>{{ isset($character) ?  $character->current_lvl : null }}</td>
						<td>Experience</td>
						<td>{{ isset($character) ?  $character->experience : null }}</td>
					</tr>
				</tbody>
			</table>

			@if(isset($character))
				<table class="table">
					<thead>
						<tr>
							<th colspan="2">Statistics</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Strength</td>
							<td>
								<label data-toggle="tooltip" data-placement="right" title="{{ 'Base: ' . $character->statistics->strength_base . '<br> + <br>Mod: ' . $character->statistics->strength_mod }}">
										{{ $character->statistics->strength_base + $character->statistics->strength_mod }}
								</label>
							</td>
						</tr>
						<tr>
							<td>Dexterity</td>
							<td>
								<label data-toggle="tooltip" data-placement="right" title="{{ $character->statistics->dexterity_base . ' + ' . $character->statistics->dexterity_mod }}">
										{{ $character->statistics->dexterity_base + $character->statistics->dexterity_mod }}
								</label>
							</td>
						</tr>
						<tr>
							<td>Constitution</td>
							<td>
								<label data-toggle="tooltip" data-placement="right" title="{{ $character->statistics->constitution_base . ' + ' . $character->statistics->constitution_mod }}">
										{{ $character->statistics->constitution_base + $character->statistics->constitution_mod }}
								</label>
							</td>
						</tr>
						<tr>
							<td>Intellegence</td>
							<td>
								<label data-toggle="tooltip" data-placement="right" title="{{ $character->statistics->intellegence_base . ' + ' . $character->statistics->intellegence_mod }}">
										{{ $character->statistics->intellegence_base + $character->statistics->intellegence_mod }}
								</label>
							</td>
						</tr>
					</tbody>	
				</table>
			@endif
		</div>
	</div>

	<div class="col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4 class="panel-title">Equipment</h4>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Slot</th>
						<th>Item</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Head</td>
						<td>{{  isset($character) ? $character->equipmentslots->head->name : null }}</td>
					</tr>
					<tr>
						<td>Body</td>
						<td>{{  isset($character) ? $character->equipmentslots->body->name : null }}</td>
					</tr>
					<tr>
						<td>Arms</td>
						<td>{{  isset($character) ? $character->equipmentslots->hands->name : null }}</td>
					</tr>
					<tr>
						<td>Feet</td>
						<td>{{  isset($character) ? $character->equipmentslots->feet->name : null }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4 class="panel-title">Relationships</h4>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Character</th>
						<th>Affinity</th>
					</tr>
				</thead>
				<tbody>
					@if(isset($character))
						@foreach($character->friends as $friend)
							<tr>
								<td><label>{{ $friend->name }}</label></td>
								<td><label>{{ $friend->pivot->value }}</label></td>
							</tr>
						@endforeach
					@else
						@foreach($allCharacters as $character)
							<tr>
								<td><label>{{ $character->name }}</label></td>
								<td>{!! Form::text('value[' . $character->id . ']', 0, ['class' => 'form-control']) !!}</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>