<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('Name') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<div class="row text-center">
				{!! Form::label('Grid Size') !!}
			</div>
			<div class="col-sm-6">
				<div class="input-group">
					{!! Form::text('number_cols', null, ['class' => 'form-control']) !!}
					<div class="input-group-addon">
						Cols
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="input-group">
					{!! Form::text('number_rows', null, ['class' => 'form-control']) !!}
					<div class="input-group-addon">
						Rows
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<h4 class="text-center">Allies</h4>

		@if(isset($map))
			@foreach($map->ally_data as $ally)
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							{!! Form::label('Character') !!}
							{!! Form::select('ally_character_id[]', $character_names, $ally['character_id'], ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="text-center">
							{!! Form::label('Starting Position') !!}
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group">
									{!! Form::text('ally_character_start_x[]', $ally['x_loc'], ['class' => 'form-control']) !!}
									<div class="input-group-addon">
										X
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									{!! Form::text('ally_character_start_y[]', $ally['y_loc'], ['class' => 'form-control']) !!}
									<div class="input-group-addon">
										Y
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		@else
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					{!! Form::label('Character') !!}
					{!! Form::select('ally_character_id[]', $character_names, null, ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="col-sm-6">
				<div class="text-center">
					{!! Form::label('Starting Position') !!}
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							{!! Form::text('ally_character_start_x[]', null, ['class' => 'form-control']) !!}
							<div class="input-group-addon">
								X
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group">
							{!! Form::text('ally_character_start_y[]', null, ['class' => 'form-control']) !!}
							<div class="input-group-addon">
								Y
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif

		<span id="alliesList"></span>

		<div class="pull-left">
			<a href="#" onclick="addAlly()">Add</a>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="text-center">
			<h4 class="text-center">Enemies</h4>
		</div>

		@if(isset($map))
			@foreach($map->enemy_data as $enemy)
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							{!! Form::label('Character') !!}
							{!! Form::select('ally_character_id[]', $character_names, $enemy['character_id'], ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="text-center">
							{!! Form::label('Starting Position') !!}
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group">
									{!! Form::text('ally_character_start_x[]', $enemy['x_loc'], ['class' => 'form-control']) !!}
									<div class="input-group-addon">
										X
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									{!! Form::text('ally_character_start_y[]', $enemy['y_loc'], ['class' => 'form-control']) !!}
									<div class="input-group-addon">
										Y
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		@else
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					{!! Form::label('Character') !!}
					{!! Form::select('enemy_character_id[]', $character_names, null, ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="col-sm-6">
				<div class="text-center">
					{!! Form::label('Starting Position') !!}
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							{!! Form::text('enemy_character_start_x[]', null, ['class' => 'form-control']) !!}
							<div class="input-group-addon">
								X
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group">
							{!! Form::text('enemy_character_start_y[]', null, ['class' => 'form-control']) !!}
							<div class="input-group-addon">
								Y
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif

		<span id="enemiesList"></span>
		
		<div class="pull-left">
			<a href="#" onclick="addEnemy()">Add</a>
		</div>
	</div>
</div>

@section('scripts')
@parent
	<script type="text/javascript">
		<?php if(isset($map)): ?>
			<?php 	$allyIndex = count($map->ally_data); 
					$enemyIndex = count($map->enemy_data);
			?>
			var allyIndex = {!! $allyIndex !!};
			var enemyIndex = {!! $enemyIndex !!};
		<?php else: ?>
			var allyIndex = 1;
			var enemyIndex = 1;
		<?php endif; ?>

		// $('#effectsAdd').click(function(e){
		function addAlly() {
        	// e.preventDefault();

            allyIndex ++;

            $('#alliesList').append('' +
            	'<div class="row" id="ally_'+ allyIndex +'">' +
	            	'<div class="col-sm-6">' +
					'<div class="form-group">' +
						'<select name="ally_character_id[]" class="form-control"><?php foreach ($character_names as $key => $value) { echo '<option value="'.$key.'">'.$value.'</option>'; } ?></select>' +
						'<a href="javascript:void(0);" onclick="removeRow('+ "'#ally_" + allyIndex + "'"+')">Remove</a>' +
					'</div>' +
				'</div>' +
				'<div class="col-sm-6">' +
					'<div class="row">' +
						'<div class="col-sm-6">' +
							'<div class="input-group">' +
								'<input type="text" name="ally_character_start_x[]" class="form-control" />' +
								'<div class="input-group-addon">X</div>' +
							'</div>' +
						'</div>' +
						'<div class="col-sm-6">' +
							'<div class="input-group">' +
								'<input type="text" name="ally_character_start_y[]" class="form-control" />' +
								'<div class="input-group-addon">Y</div>' +
							'</div>' +
						'</div>' +
					'</div>' +
				'</div>');
        // });
    }

    function addEnemy() {
    	enemyIndex ++;

    	$('#enemiesList').append('' +
            	'<div class="row" id="enemy_'+ enemyIndex +'">' +
	            	'<div class="col-sm-6">' +
					'<div class="form-group">' +
						'<select name="enemy_character_id[]" class="form-control"><?php foreach ($character_names as $key => $value) { echo '<option value="'.$key.'">'.$value.'</option>'; } ?></select>' +
						'<a href="javascript:void(0);" onclick="removeRow('+ "'#enemy_" + enemyIndex + "'"+')">Remove</a>' +
					'</div>' +
				'</div>' +
				'<div class="col-sm-6">' +
					'<div class="row">' +
						'<div class="col-sm-6">' +
							'<div class="input-group">' +
								'<input type="text" name="enemy_character_start_x[]" class="form-control" />' +
								'<div class="input-group-addon">X</div>' +
							'</div>' +
						'</div>' +
						'<div class="col-sm-6">' +
							'<div class="input-group">' +
								'<input type="text" name="enemy_character_start_y[]" class="form-control" />' +
								'<div class="input-group-addon">Y</div>' +
							'</div>' +
						'</div>' +
					'</div>' +
				'</div>');
    }

    function removeRow(rowID)
	{
	    $(rowID).remove();
	}
	</script>
@stop