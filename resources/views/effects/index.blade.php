@extends('_partials.admin')

@section('content')
	<section>
		<div class="panel panel-info">
			<div class="panel-heading">
				{{-- <label>Effects ({{ count($effects) > 0 ? count($effects) : 0 }})</label> --}}
				<h3 class="panel-title">
					Effects ({{ count($effects) }})
					<span class="pull-right">
						<button class="btn btn-primary" data-toggle="modal" data-target="#effectsAddModel">+ Add</button>
					</span>
				</h3>
				
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Description</th>
							<th>Target Stat</th>
						</tr>
					</thead>
					<tbody>
						@foreach($effects as $effect)
							<tr>
								<td>{{ $effect->id }}</td>
								<td>{{ $effect->name }}</td>
								<td>{{ \Illuminate\Support\Str::limit($effect->description, 100) }}</td>
								<td>{{ $effect->target_stat }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
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

	</section>
@stop