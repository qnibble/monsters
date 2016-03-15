@extends('_partials.admin')

@section('content')
<section>
	<div class="row">
		<div class="col-sm-6">
			<div class="panel-group" id="accordionLeft" role="tablist" aria-multiselectable="true">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordionLeft" data-target="#abilitiesCollapse">
								Abilities ({{ $abilities_total }})
							<span class="pull-right">
								<a href="{{ url('ability/create') }}" class="btn btn-default" style="color:black">+ Add</a>
							</span>
						</h4>
					</div>
					<div id="abilitiesCollapse" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
						<table class="table" style="margin: 0">
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
						<div class="panel-footer">
							<div class="text-center">
								<a href="{{ url('ability') }}" class="btn btn-primary">View All</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordionLeft" data-target="#armoursCollapse">
							Armours ({{ $armours_total }})
							<span class="pull-right">
								<a href="{{ url('armour/create') }}" class="btn btn-default btn-xs" style="color:black">+ Add</a>
							</span>
						</h4>
					</div>
					<div id="armoursCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
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
						<div class="panel-footer">
							<div class="text-center">
								<a href="{{ url('armour') }}" class="btn btn-primary">View All</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordionLeft" data-target="#weaponsCollapse">
							Weapons ({{ $weapons_total }})
							<span class="pull-right">
								<a href="{{ url('weapon/create') }}" class="btn btn-default btn-xs" style="color:black">+ Add</a>
							</span>
						</h4>
					</div>
					<div id="weaponsCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Damage</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($weapons as $weapon)
								<tr>
									<td>{{ $weapon->id }}</td>
									<td>{{ $weapon->name }}</td>
									<td>{{ $weapon->damage  }}</td>
									<td><a href="{{ url('weapon/' . $weapon->id) }}" class="btn btn-info">View</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="panel-footer">
							<div class="text-center">
								<a href="{{ url('weapon') }}" class="btn btn-primary">View All</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="panel-group" id="accordionRight" role="tablist" aria-multiselectable="true">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordionRight" data-target="#collapseOne">
								Characters ({{ $characters_total }})
							<span class="pull-right">
								<a href="{{ url('ability/create') }}" class="btn btn-default btn-xs" style="color:black">+ Add</a>
							</span>
						</h4>
					</div>
					<div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
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
										<label data-toggle="tooltip" data-placement="bottom" title="{{ 'Base: ' . $character->statistics->strength_base . '<br> + <br>Mod: ' . $character->statistics->strength_mod }}">
											{{ $character->statistics->strength_base + $character->statistics->strength_mod }}
										</label>
									</td>
									<td>
										<label data-toggle="tooltip" data-placement="bottom" title="{{ $character->statistics->dexterity_base . ' + ' . $character->statistics->dexterity_mod }}">
											{{ $character->statistics->dexterity_base + $character->statistics->dexterity_mod }}
										</label>
									</td>
									<td>
										<label data-toggle="tooltip" data-placement="bottom" title="{{ $character->statistics->constitution_base . ' + ' . $character->statistics->constitution_mod }}">
											{{ $character->statistics->constitution_base + $character->statistics->constitution_mod }}
										</label>
									</td>
									<td>
										<label data-toggle="tooltip" data-placement="bottom" title="{{ $character->statistics->intellegence_base . ' + ' . $character->statistics->intellegence_mod }}">
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
						<div class="panel-footer">
							<div class="text-center">
								<a href="{{ url('character') }}" class="btn btn-primary">View All</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordionRight" data-target="#collapseTwo">
							Maps ({{ $maps_total }})
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
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
											<td><button class="btn btn-info">View</button></td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<div class="panel-footer">
								<div class="text-center">
									<a href="{{ url('mapdata') }}" class="btn btn-primary">View All</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordionRight" data-target="#collapseThree">
							Items ({{ $items_total }})
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Type</th>
									<th>Effects</th>
								</tr>
							</thead>
							<tbody>
								@foreach($items as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>
										<label data-toggle="tooltip" data-placement="bottom" title="{{ $item->description }}">
											{{ $item->name }}
										</label>
									</td>
									<td>{{ $item->type }}</td>
									<td>{{ count($item->effects) }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="panel-footer">
							<div class="text-center">
								<a href="{{ url('items') }}" class="btn btn-primary">View All</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="effectsAddModel" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Add Effect</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6 form-group">
							{!! Form::label('Name') !!}
							{!! Form::text('effect_name', null, ['class' => 'form-control']) !!}
						</div>

						<div class="col-sm-6 form-group">
							{!! Form::label('Target Stat') !!}
							{!! Form::text('effect_target_stat', null, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('Description') !!}
						{!! Form::textarea('effect_description', null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="submitEffectForSaving()">Save</button>
				</div>
			</div>
		</div>
	</div>

	<div id="itemsAddModel" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Add Item</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6 form-group">
							{!! Form::label('Name') !!}
							{!! Form::text('item_name', null, ['class' => 'form-control']) !!}
						</div>

						<div class="col-sm-6 form-group">
							{!! Form::label('Type') !!}
							{!! Form::select('item_type', [
								'consumeable' => 'Consumeable',
								'armour' => 'Armour',
								'weapon' => 'Weapon'
								], null, ['class' => 'form-control input-sm']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('Description') !!}
							{!! Form::textarea('item_description', null, ['class' => 'form-control']) !!}
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								Effects
							</div>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th></th>
											<th>Effect</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody id="effectsList">
										<tr id="effectsRow_1">
											<td><a class="btn btn-danger" href="javascript:void(0);" onclick="removeRow(effectsRow_1)">x</a></td>
											<td>{!! Form::select('item_type', $effect_names, null, ['class' => 'form-control input-sm']) !!}</td>
											<td>{!! Form::text('effect_amount', null, ['class' => 'form-control']) !!}</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="3"><div class="text-center"><button id="effectsAdd" class="btn btn-primary">Add</button></div></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="submitItemForSaving()">Save</button>
					</div>
				</div>
			</div>
		</div>

	</section>
@stop

@section('styles')	
	{!! Html::style('//cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css') !!}
@stop
@section('scripts')
	{!! Html::script('//cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js') !!}
	<script type="text/javascript">
		function submitEffectForSaving() {
			var form_Data = {
				'_token': '{{ csrf_token() }}',
				'name': $("input[name='effect_name']").val(),
				'target_stat': $("input[name='effect_target_stat']").val(),
				'description': $("textarea[name='effect_description']").val()
			};

			$.ajax({
				type: "POST",
			  	url: "{{ url('effects') }}",
			  	data: form_Data
			}).done(function() {
				$('#effectsAddModel').modal('hide');
				location.reload(); 
			});
		}

		function submitItemForSaving() {
			var form_Data = {
				'_token': '{{ csrf_token() }}',
				'name': $("input[name='item_name']").val(),
				'type': $("select[name='item_type'] option:selected").val(),
				'description': $("textarea[name='item_description']").val()
			};

			$.ajax({
				type: "POST",
			  	url: "{{ url('items') }}",
			  	data: form_Data
			}).done(function() {
				$('#itemsAddModel').modal('hide');
				location.reload(); 
			});
		}

		function removeRow(rowID)
	    {
	        $(rowID).remove();
	    }

		$(function() {
		    $('#characters-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('character.data') !!}',
		        columnDefs: [
		        	{
		        		render: function(data, type, row) {
		        			var mod = row.statistics.strength_mod,
		        				tot = data + mod;

		        			return '<span data-toggle="tooltip" data-placement="bottom" title="Base: ' + data + '<br> + <br>Mod: ' + mod + '">' + tot + '</span>';
		        		},
		        		targets: 3
		        	},
		        	{targets: [4], visible: false },
		        ],
		        columns: [
		            { data: 'id', name: 'id' },
		            { data: 'name', name: 'name' },
		            { data: 'biography', name: 'biography' },
		            { data: 'statistics.strength_base', name: 'strength_base' },
		            { data: 'statistics.strength_mod', name: 'strength_mod' }
		        ]
		    });
		});

		$(function () {
	        var effectsIndex = 1;

	        $('#effectsAdd').click(function() {
	            effectsIndex ++;

	            $('#effectsList').append('<tr id="effectsRow_' + effectsIndex + '">' + 
	            	'<td><a class="btn btn-danger" href="javascript:void(0);" onclick="removeRow(effectsRow_'+ effectsIndex +')">x</a></td>' + 
	            	'<td><input type="text"></td>' + 
	            	'<td><input type="text"></td>' + 
	            	'</tr>');
	        });
	    });
	</script>
@stop