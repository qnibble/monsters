@extends('_partials.admin')

@section('content')
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					Edit Map
				</div>
				{!! Form::model($map, ['route' => ['mapdata.update', $map->id], 'method' => 'patch']) !!}
					<div class="panel-body">
						@include('mapdata._form')
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
		<div class="col-sm-2">
			<div class="panel panel-warning">
				<div class="panel-body">
					<label>Remember: Rows are the Y value; Columns are the X value.</label>
					<label>The Grid is drawn from the upper left(1, 1) to the lower right(#cols, #rows).</label>
				</div>
			</div>
		</div>
	</div>
@stop