<div id="characterScope">
<div class="row">
	<div class="col-sm-4">
		@include('character.panels._charinfo')
	</div>

	<div class="col-sm-4">
		@include('character.panels._equipment')
	</div>

	<div class="col-sm-4">
		@include('character.panels._progressdata')
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		@include('character.panels._abilities')
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
</div>

@section('scripts')
@parent
	<script type="text/javascript">
		var vm = new Vue({
			el: "#characterScope",
			data: {
				strength_base: 0,
				dexterity_base: 0,
				constitution_base: 0,
				intellegence_base: 0,
				starting_lvl: 0,
				experience: 0,
				selected_helm: 1,
				helms: [  
					@foreach($armours_head as $helm)
						{
							id: {!! $helm->id !!},
							value: {!! $helm->armour_value !!},
						},
					@endforeach
				],
			},
			computed: {
				maxHP: function () {
					return this.constitution_base * 5
				},
				totalDefense: function () {
					return this.helms[this.selected_helm]['value']
				},
				speed: function () {
					return this.dexterity_base
				},
			},
		});
	</script>
@stop