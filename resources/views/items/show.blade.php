@extends('_partials.admin')

@section('content')
	<section>
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-6">
							{!! Form::label('Name') !!}
							{!! Form::text('name', $item->name, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group col-sm-6">
							{!! Form::label('Type') !!}
							{!! Form::text('type', $item->type, ['class' => 'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('Description') !!}
						{!! Form::textarea('description', $item->description, ['class' => 'form-control']) !!}
					</div>

					<table class="table">
						@foreach($item->effects as $key => $effect)
							<tr>
								<td>Effect ID: #{{ $key }}</td>
								<td>Value: {{ $effect }}</td>	
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</section>
@stop