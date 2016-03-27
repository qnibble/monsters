<div class="panel panel-info">
	<div class="panel-heading">
		<h4 class="panel-title">
			Abilities

			<span class="pull-right">
				<span class="glyphicon glyphicon-list"></span>
			</span>
		</h4>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Level</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(isset($character) && count($character->hasAbilities) > 0)
				@foreach($character->hasAbilities as $ability)
					<tr>
						<td>{{ $ability['id'] }}</td>
						<td>
							<label  
								data-toggle="tooltip" 
								data-placement="right" 
								title="{{ $all_abilities[$ability['id'] - 1]->description }}">
									{{ $all_abilities[$ability['id'] - 1]->name }}
							</label>
						</td>
						<td>
							<label  
								data-toggle="tooltip" 
								data-placement="right" 
								title="{{ 'Experience: ' . $ability['exp'] . ' / ?' }}">
									{{ $ability['level'] }}
							</label>
						</td>
						<td>
							<a href="#" class="btn btn-xs btn-danger">&times</a>
							<a href="{{ url('ability/' . $ability['id']) }}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-search"></span></a>
							<a href="#" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	<div class="panel-footer">
		<div class="text-center">
			<a href="#" class="btn btn-primary">Add</a>
		</div>
	</div>
</div>