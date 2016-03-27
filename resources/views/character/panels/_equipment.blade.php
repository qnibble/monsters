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
				<td>
					@if(isset($character))
						{{ $character->equipmentslots->head->name }}
					@else
						{!! Form::select('head_id', $armours_head_list, null, ['class' => 'form-control', 'v-model' => 'selected_helm']) !!}
					@endif
				</td>
			</tr>
			<tr>
				<td>Body</td>
				<td>
					@if(isset($character))
						{{ $character->equipmentslots->body->name }}
					@else
						{!! Form::select('body_id', $armours_body, null, ['class' => 'form-control']) !!}
					@endif
				</td>
			</tr>
			<tr>
				<td>Arms</td>
				<td>
					@if(isset($character))
						{{ $character->equipmentslots->hands->name }}
					@else
						{!! Form::select('arms_id', $armours_arms, null, ['class' => 'form-control']) !!}
					@endif
				</td>
			</tr>
			<tr>
				<td>Feet</td>
				<td>
					@if(isset($character))
						{{ $character->equipmentslots->feet->name }}
					@else
						{!! Form::select('feet_id', $armours_feet, null, ['class' => 'form-control']) !!}
					@endif
				</td>
			</tr>
		</tbody>
	</table>
</div>