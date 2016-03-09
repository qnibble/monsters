@extends('_partials.admin')

@section('content')
	<section>
	<div class="panel panel-info">
		<div class="panel-heading">
			<label>Items ({{ count($items) }})</label>
			<span class="pull-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#itemsAddModel">+ Add</button>
			</span>
		</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Type</th>
						<th>Effects</th>
						<th>Actions</th>
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
							<td><a class="btn btn-info" href="{{ url('items/' . $item->id) }}">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
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