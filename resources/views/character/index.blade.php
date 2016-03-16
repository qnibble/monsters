@extends('_partials.admin')

@section('content')
<section>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
				Characters ({{ count($characters) }})
				<span class="pull-right">
					<a href="{{ url('character/create') }}" class="btn btn-primary">+ Add</a>
				</span>
			</h3>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Class</th>
					<th>Strength</th>
					<th>Dexterity</th>
					<th>Constitution</th>
					<th>Intellegence</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($characters as $character)
					<tr>
						<td>{{ $character->id }}</td>
						<td>
							<label data-toggle="tooltip" data-placement="bottom" title="{{ $character->biography }}">
								{{ $character->name }}
							</label>
						</td>
						<td>
							<label>{{ $character->unitclass->name }}</label>
						</td>
						<td>
							<label 
								<?php if($character->statistics->strength_mod > 0) { echo 'style="color:green"'; }?>
								data-toggle="tooltip" 
								data-placement="bottom" 
								title="{{ 'Base: ' . $character->statistics->strength_base . '<br> + <br>Mod: ' . $character->statistics->strength_mod }}">
								{{ $character->statistics->strength_base + $character->statistics->strength_mod }}
							</label>
						</td>
						<td>
							<label 
								<?php if($character->statistics->dexterity_mod > 0) { echo 'style="color:green"'; }?>
								data-toggle="tooltip" 
								data-placement="bottom" 
								title="{{ $character->statistics->dexterity_base . ' + ' . $character->statistics->dexterity_mod }}">
								{{ $character->statistics->dexterity_base + $character->statistics->dexterity_mod }}
							</label>
						</td>
						<td>
							<label 
								<?php if($character->statistics->constitution_mod > 0) { echo 'style="color:green"'; }?>
								data-toggle="tooltip" 
								data-placement="bottom" 
								title="{{ $character->statistics->constitution_base . ' + ' . $character->statistics->constitution_mod }}">
								{{ $character->statistics->constitution_base + $character->statistics->constitution_mod }}
							</label>
						</td>
						<td>
							<label 
								<?php if($character->statistics->intellegence_mod > 0) { echo 'style="color:green"'; }?>
								data-toggle="tooltip" 
								data-placement="bottom" 
								title="{{ $character->statistics->intellegence_base . ' + ' . $character->statistics->intellegence_mod }}">
								{{ $character->statistics->intellegence_base + $character->statistics->intellegence_mod }}
							</label>
						</td>
						<td>
							<a class="btn btn-info" href="{{ url('character/' . $character->id ) }}">View</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>
@stop