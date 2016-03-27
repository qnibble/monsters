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
								<a href="{{ url('ability/create') }}" class="btn btn-default btn-xs" style="color:black">+ Add</a>
							</span>
						</h4>
					</div>
					<div id="abilitiesCollapse" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
						@if($abilities_total > 0)
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
						@else
							<div class="row text-center">
								<label>No Abilities</label>
							</div>
						@endif
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
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="headingFour">
						<h4 class="panel-title" data-toggle="collapse" data-parent="#accordionLeft" data-target="#conversationsCollapse">
							Conversations (ToDo)
							<span class="pull-right">
								<a href="#" class="btn btn-default btn-xs" style="color:black">+ Add</a>
							</span>
						</h4>
					</div>
					<div id="conversationsCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Subjects</th>
									<th>Nodes</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>

						<div class="panel-footer">
							<div class="text-center">
								<a href="#" class="btn btn-primary">View All</a>
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
								<a href="{{ url('character/create') }}" class="btn btn-default btn-xs" style="color:black">+ Add</a>
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
							<span class="pull-right">
								<a href="{{ url('mapdata/create') }}" class="btn btn-default btn-xs" style="color:black">+ Add</a>
							</span>
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
											<td>
												<label
													data-toggle="tooltip"
													data-placement="bottom"
													title="<?php foreach($map->allies as $ally): echo $ally->name .'<br>'; endforeach; ?>">
														{{ count($map->ally_data) }}
												</label>
											</td>
											<td>
												<label
													data-toggle="tooltip"
													data-placement="bottom"
													title="<?php foreach($map->enemies as $enemy): echo $enemy->name .'<br>'; endforeach; ?>">
														{{ count($map->enemy_data) }}
												</label>
											</td>
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
						@if($items_total > 0)
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
						@else
							<div class="row text-center">
								<label>No Items</label>
							</div>
						@endif
					</div>
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
		
	</script>
@stop
