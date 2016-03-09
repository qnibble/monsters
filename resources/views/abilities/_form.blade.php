<div class="panel panel-info">
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					{!! Form::label('Name') !!}
					{!! Form::text('name', isset($ability) ? $ability->name : null, ['class' => 'form-control']) !!}
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					{!! Form::label('Range') !!}
					<div class="input-group">
						{!! Form::text('range', isset($ability) ? $ability->range : null, ['class' => 'form-control', 'onkeydown' => 'testForNumber(this, event)']) !!}
						<div class="input-group-addon">
							Squares
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('Description') !!}
			{!! Form::textarea('description', isset($ability) ? $ability->description : null, ['class' => 'form-control']) !!}
		</div>
		
		<h3>Effects:</h3>
		@if(!isset($ability))
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Target') !!}
						{!! Form::select('target[]', [0 => 'Self', 1 => 'Ally', 2 => 'AllyOrSelf', 3 => 'Enemy'], null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Duration') !!}
						<div class="input-group">
							{!! Form::text('duration[]', null, ['class' => 'form-control']) !!}
							<!-- div class="input-group-addon">
								{!! Form::select('duration_type[]', ['r' => 'R', 'b' => 'B'], null, ['class' => 'form-control']) !!}
							</div -->
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Target Stat') !!}
						{!! Form::select('target_stat[]', $effectable_stats, null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Modifier') !!}
						{!! Form::text('modifier[]', null, ['class' => 'form-control force-number']) !!}
					</div>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Target') !!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Duration') !!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Target Stat') !!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{!! Form::label('Modifier') !!}
					</div>
				</div>
			</div>
			<?php $index = 1; ?>
			@foreach($ability->effects as $effect)
				<div id="effect_{{ $index }}" class="row">
					<div class="col-sm-3">
						<div class="form-group">
							{!! Form::select('target[]', [0 => 'Self', 1 => 'Ally', 2 => 'AllyOrSelf', 3 => 'Enemy'], $effect['target'], ['class' => 'form-control']) !!}
							@if($index != 1)
								<a href="javascript:void(0);" onclick="removeRow('{!! '#effect_' . $index !!}')">Remove</a>
							@endif
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<div class="input-group">
								{!! Form::text('duration[]', $effect['duration'], ['class' => 'form-control']) !!}
								<!-- div class="input-group-addon">
									{!! Form::select('duration_type[]', ['r' => 'R', 'b' => 'B'], null, ['class' => 'form-control']) !!}
								</div -->
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							{!! Form::select('target_stat[]', $effectable_stats, $effect['target_stat'], ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							{!! Form::text('modifier[]', $effect['modifier'], ['class' => 'form-control force-number']) !!}
						</div>
					</div>
				</div>
				<?php $index++; ?>
			@endforeach
		@endif
		<span id="effectsList"></span>
		<hr>
		<button id="effectsAdd" class="btn btn-primary">Add</button id="effectsAdd">
	</div>
</div>
</div>

@section('scripts')
	@parent
	<script type="text/javascript">
		<?php if(isset($ability)): ?>
			<?php $effectsIndex = count($ability->effects); ?>
			var effectsIndex = {!! $effectsIndex !!};
		<?php else: ?>
			var effectsIndex = 1;
		<?php endif; ?>

		function removeRow(rowID)
		{
		    $(rowID).remove();
		}

		function reinitializeElements() {
			$('.select2').select2({
                minimumResultsForSearch: 5
            });
		}

        $('#effectsAdd').click(function(e){
        	e.preventDefault();

            effectsIndex ++;

            <?php $target_list = [0 => 'Self', 1 => 'Ally', 2 => 'AllyOrSelf', 3 => 'Enemy']; ?>
            $('#effectsList').append(''+
            	'<div class="row" id="effect_'+ effectsIndex +'">' +
					'<div class="col-sm-3 form-group">' +
						'<select class="form-control select2" name="target[]"><?php foreach ($target_list as $key => $value) { echo '<option value="'.$key.'">'.$value.'</option>'; } ?></select>' +
						'<a href="javascript:void(0);" onclick="removeRow('+ "'#effect_" + effectsIndex + "'"+')">Remove</a>' +
					'</div>' +
					'<div class="col-sm-3 form-group">' +
						'<input type="text" class="form-control" name="duration[]"></input>' +
					'</div>' +
					'<div class="col-sm-3 form-group">' +
						'<select class="form-control select2" name="target_stat[]"><?php foreach ($effectable_stats as $key => $value) { echo '<option value="'.$key.'">'.$value.'</option>'; } ?></select>' +
					'</div>' +
					'<div class="col-sm-3 form-group">' +
						'<input type="text" class="form-control force-number" name="modifier[]"></input>' +
					'</div>' +
				'</div>');

            reinitializeElements();
        });
	</script>
@stop