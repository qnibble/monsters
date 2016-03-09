@extends('_partials.admin')

@section('content')
	<section>
		{!! Form::open(['url' => url('armour')]) !!}
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					@include('armour._form')
				</div>
			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		{!! Form::close() !!}
	</section>
@stop

@section('scripts')
	
@stop