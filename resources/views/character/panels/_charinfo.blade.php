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
					<td>{!! Form::textarea('biography', null, ['class' => 'form-control']) !!}</td>
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
				<td>Class</td>
				<td>
					@if(isset($character))
						<label
							data-toggle="tooltip" 
							data-placement="bottom" 
							title="{{ $character->unitclass->description }}">
							{{ $character->unitclass->name }}
						</label>
					@else
						{!! Form::select('class_id', $unitclasses, null, ['class' => 'form-control']) !!}
					@endif
				</td>
				<td>Starting Level</td>
				<td>
					@if(isset($character))
						{{ $character->starting_lvl }}
					@else
						{!! Form::text('starting_lvl', null, ['class' => 'form-control', 'v-model' => 'starting_lvl']) !!}
					@endif
				</td>
			</tr>
			<tr>
				<td>Current Level</td>
				<td>
					@if(isset($character))
						{{ $character->current_lvl }}
					@else
						@{{ starting_lvl }}
					@endif
				</td>
				<td>Experience</td>
				<td>
					@if(isset($character))
						<label
							data-toggle="tooltip" 
							data-placement="bottom" 
							title="{{ $character->unitclass->name }}:<br><?php foreach($character->unitclass->level_data as $required): echo $required . ', '; endforeach; ?>">
							{{ isset($character) ?  $character->experience : null }}
						</label>
					@else
						@{{ experience }}
					@endif
				</td>
			</tr>
		</tbody>
	</table>

	<table class="table">
		<thead>
			<tr>
				<th colspan="2">{{ isset($character) ? 'Statistics' : 'Statistics (Base)' }}</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Strength</td>
				<td>
					@if(isset($character))
						<label 
							<?php if($character->statistics->strength_mod > 0) { echo 'style="color:green"'; }?> 
							data-toggle="tooltip" 
							data-placement="right" 
							title="{{ 'Base: ' . $character->statistics->strength_base . '<br> + <br>Mod: ' . $character->statistics->strength_mod }}">
								{{ $character->statistics->strength_base + $character->statistics->strength_mod }}
						</label>
					@else
						{!! Form::text('strength_base', null, ['class' => 'form-control', 'v-model' => 'strength_base']) !!}
					@endif
				</td>
			</tr>
			<tr>
				<td>Dexterity</td>
				<td>
					@if(isset($character))
						<label 
							<?php if($character->statistics->dexterity_mod > 0) { echo 'style="color:green"'; }?> 
							data-toggle="tooltip" 
							data-placement="right" 
							title="{{ $character->statistics->dexterity_base . ' + ' . $character->statistics->dexterity_mod }}">
								{{ $character->statistics->dexterity_base + $character->statistics->dexterity_mod }}
						</label>
					@else
						{!! Form::text('dexterity_base', null, ['class' => 'form-control', 'v-model' => 'dexterity_base']) !!}
					@endif
				</td>
			</tr>
			<tr>
				<td>Constitution</td>
				<td>
					@if(isset($character))
						<label 
							<?php if($character->statistics->constitution_mod > 0) { echo 'style="color:green"'; }?> 
							data-toggle="tooltip" 
							data-placement="right" 
							title="{{ $character->statistics->constitution_base . ' + ' . $character->statistics->constitution_mod }}">
								{{ $character->statistics->constitution_base + $character->statistics->constitution_mod }}
						</label>
					@else
						{!! Form::text('constitution_base', null, ['class' => 'form-control', 'v-model' => 'constitution_base']) !!}
					@endif
				</td>
			</tr>
			<tr>
				<td>Intellegence</td>
				<td>
					@if(isset($character))
						<label 
							<?php if($character->statistics->intellegence_mod > 0) { echo 'style="color:green"'; }?> 
							data-toggle="tooltip" 
							data-placement="right" 
							title="{{ $character->statistics->intellegence_base . ' + ' . $character->statistics->intellegence_mod }}">
								{{ $character->statistics->intellegence_base + $character->statistics->intellegence_mod }}
						</label>
					@else
						{!! Form::text('intellegence_base', null, ['class' => 'form-control', 'v-model' => 'intellegence_base']) !!}
					@endif
				</td>
			</tr>
		</tbody>	
	</table>

	
	<table class="table">
		<thead>
			<tr>
				<th colspan="2">Derived Statistics</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Max HP</td>
				<td>
					@if(isset($character))
						{{ $character->derivedstats->max_hp }}
					@else
						@{{ maxHP }}
					@endif
				</td>
			</tr>
			<tr>
				<td>Total Defense</td>
				<td>
					@if(isset($character))
						{{ $character->derivedstats->total_defense }}
					@else
						@{{ totalDefense }}
					@endif
				</td>
			</tr>
			<tr>
				<td>Speed</td>
				<td>
					@if(isset($character))
						{{ $character->derivedstats->speed }}
					@else
						@{{ speed }}
					@endif
				</td>
			</tr>
		</tbody>	
	</table>
</div>
