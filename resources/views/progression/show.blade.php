@extends('_partials.admin')

@section('content')
	<div id="progressScope">
	<div class="row">
		<div class="col-sm-2">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h4>Associate</h4>
				</div>
				<div class="panel-body">
					@if($associate instanceof \App\Ability)
						<table class="table">
							<tbody>
								<tr>
									<td>Type</td>
									<td>{{ substr($progression->tracker_type, 4) }}</td>
								</tr>
								<tr>
									<td>ID</td>
									<td>{{ $progression->tracker_id }}</td>
								</tr>
								<tr>
									<td>Name</td>
									<td>{{ $associate->name }}</td>
								</tr>
							</tbody>
						</table>
					@endif
					@if($associate instanceof \App\Character)
						<label>Character</label>
					@endif
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="col-sm-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Progress Matrix</h4>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>Level</th>
								<th>Exp Needed</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="entry in matrix_entries">
								<td>@{{ entry.index }}</td>
								{{-- <td>@{{ entry.value }}</td> --}}
								<td>{!! Form::text('entry_values[]', null, ['class' => 'form-control', 'v-model' => 'entry.value']) !!}</td>
							</tr>
						</tbody>
					</table>
					<div class="panel-footer">
						<div class="text-center">
							<button v-on:click="addEntry()" class="btn btn-primary">Add</button>
						</div>
					</div>			
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>
							Tier Data
						</h4>
					</div>
					<table class="table">
						<tbody>
							<tr>
								<td>Tier 1</td>
								<td>{{ $progression->tier1 }}</td>
							</tr>
							<tr>
								<td>Tier 2</td>
								<td>{{ $progression->tier2 }}</td>
							</tr>
							<tr>
								<td>Tier 3</td>
								<td>{{ $progression->tier3 }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
@stop

@section('scripts')
	<script type="text/javascript">
	var progressVue = new Vue({
			el: "#progressScope",
			data: {
				matrix_entries: [
					@for($index = 0; $index < count($progression->progress_matrix); $index++)
						{
							index: {{ $index + 1 }},
							value: {{ $progression->progress_matrix[$index] }},
						},
					@endfor
				],
			},
			methods: {
				addEntry: function () {
					this.matrix_entries.push({ index: (this.matrix_entries.length + 1), value: 0 })	
				},
				removeEntry: function (index) {
					this.matrix_entries.splice(index, 1)
				}
			},
		});
	</script>
@stop