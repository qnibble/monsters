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
			<?php $allyRowIndex = 0; ?>
			@foreach($map->ally_data as $ally)
				<div class="row" id="ally_{{$allyRowIndex}}">
					<div class="col-sm-6">
						<div class="form-group">
							{!! ($allyRowIndex == 0) ? Form::label('Character') : null !!}
							{!! Form::select('ally_character_id[]', $character_names, $ally['character_id'], ['class' => 'form-control']) !!}
							{!! ($allyRowIndex == 0) ? null : "<a class='btn btn-danger btn-xs btn-close' href='javascript:void(0);' onclick='removeRow(\"#ally_{$allyRowIndex}\")'>&times;</a>" !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="text-center">
							{!! ($allyRowIndex == 0) ? Form::label('Starting Position') : null !!}
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
				<?php $allyRowIndex++; ?>
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
			<a class="btn btn-info" href="#" onclick="addAlly()">+</a>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="text-center">
			<h4 class="text-center">Enemies</h4>
		</div>

		@if(isset($map))
			<?php $enemyRowIndex = 0; ?>
			@foreach($map->enemy_data as $enemy)
				<div class="row" id="enemy_{{$enemyRowIndex}}">
					<div class="col-sm-6">
						<div class="form-group">
							{!! ($enemyRowIndex == 0) ? Form::label('Character') : null !!}
							{!! Form::select('enemy_character_id[]', $character_names, $enemy['character_id'], ['class' => 'form-control']) !!}
							{!! ($enemyRowIndex == 0) ? null : "<a class='btn btn-danger btn-xs btn-close' href='javascript:void(0);' onclick='removeRow(\"#enemy_{$enemyRowIndex}\")'>&times;</a>" !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="text-center">
							{!! ($enemyRowIndex == 0) ? Form::label('Starting Position') : null !!}
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group">
									{!! Form::text('enemy_character_start_x[]', $enemy['x_loc'], ['class' => 'form-control']) !!}
									<div class="input-group-addon">
										X
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									{!! Form::text('enemy_character_start_y[]', $enemy['y_loc'], ['class' => 'form-control']) !!}
									<div class="input-group-addon">
										Y
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $enemyRowIndex++; ?>
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
			<a class="btn btn-info" href="#" onclick="addEnemy()">+</a>
		</div>
	</div>
</div>

@section('styles')
@parent
	<style type="text/css">
		.form-group {
			position: relative;
		}
		.btn-close {
			position: absolute;
			left: -10px;
			top: 5px;
		}
	</style>
@stop

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
						'<a class="btn btn-danger btn-xs btn-close" href="javascript:void(0);" onclick="removeRow('+ "'#ally_" + allyIndex + "'"+')">&times;</a>' +
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
						'<a class="btn btn-danger btn-xs btn-close" href="javascript:void(0);" onclick="removeRow('+ "'#enemy_" + enemyIndex + "'"+')">&times;</a>' +
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