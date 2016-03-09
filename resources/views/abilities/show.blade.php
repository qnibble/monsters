@extends('_partials.admin')

@section('content')
	<section>
		{!! Form::open(['url' => url('ability/' . $ability->id), 'method' => 'patch']) !!}
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					@include('abilities._form')
				</div>
			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-primary">Save Changes</button>
			</div>
		{!! Form::close() !!}
	</section>
@stop

@section('scripts')
	<script type="text/javascript">
        
	</script>
@stop