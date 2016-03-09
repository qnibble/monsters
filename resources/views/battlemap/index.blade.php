@extends('_partials.battlemap')

@section('content')
<div id="boardScope">
	<button class="btn btn-success btn-lg" v-on:click="showModal = true">Move Character</button>

	<label>Turn #@{{ turnNumber }} Character Moves: @{{ charactersToMove }}</label>

	<div class="row">
		<div class="col-sm-9">
		<table class="table-bordered">
			<tbody>
				<tr>
					<th is="rowOne" row='1' column='1' occupied="false" v-ref="profile"></th>
					<th is="rowOne" row='1' column='2' occupied="false"></th>
					<th is="rowOne" row='1' column='3' occupied="false"></th>
					<th is="rowOne" row='1' column='4' occupied="false"></th>
					<th is="rowOne" row='1' column='5' occupied="false"></th>
					<th is="rowOne" row='1' column='6' occupied="false"></th>
					<th is="rowOne" row='1' column='7' occupied="false"></th>
					<th is="rowOne" row='1' column='8' occupied="false"></th>
					<th is="rowOne" row='1' column='9' occupied="false"></th>
					<th is="rowOne" row='1' column='10' occupied="false"></th>
				</tr>
				<tr>
					<th id="row2_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 2)</label></th>
					<th id="row2_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 2)</label></th>
					<th id="row2_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 2)</label></th>
					<th id="row2_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 2)</label></th>
					<th id="row2_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 2)</label></th>
					<th id="row2_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 2)</label></th>
					<th id="row2_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 2)</label></th>
					<th id="row2_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 2)</label></th>
					<th id="row2_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 2)</label></th>
					<th id="row2_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 2)</label></th>
				</tr>
				<tr>
					<th id="row3_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 3)</label></th>
					<th id="row3_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 3)</label></th>
					<th id="row3_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 3)</label></th>
					<th id="row3_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 3)</label></th>
					<th id="row3_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 3)</label></th>
					<th id="row3_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 3)</label></th>
					<th id="row3_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 3)</label></th>
					<th id="row3_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 3)</label></th>
					<th id="row3_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 3)</label></th>
					<th id="row3_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 3)</label></th>
				</tr>
				<tr>
					<th id="row4_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 4)</label></th>
					<th id="row4_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 4)</label></th>
					<th id="row4_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 4)</label></th>
					<th id="row4_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 4)</label></th>
					<th id="row4_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 4)</label></th>
					<th id="row4_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 4)</label></th>
					<th id="row4_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 4)</label></th>
					<th id="row4_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 4)</label></th>
					<th id="row4_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 4)</label></th>
					<th id="row4_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 4)</label></th>
				</tr>
				<tr>
					<th id="row5_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 5)</label></th>
					<th id="row5_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 5)</label></th>
					<th id="row5_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 5)</label></th>
					<th id="row5_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 5)</label></th>
					<th id="row5_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 5)</label></th>
					<th id="row5_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 5)</label></th>
					<th id="row5_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 5)</label></th>
					<th id="row5_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 5)</label></th>
					<th id="row5_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 5)</label></th>
					<th id="row5_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 5)</label></th>
				</tr>
				<tr>
					<th id="row6_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 6)</label></th>
					<th id="row6_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 6)</label></th>
					<th id="row6_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 6)</label></th>
					<th id="row6_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 6)</label></th>
					<th id="row6_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 6)</label></th>
					<th id="row6_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 6)</label></th>
					<th id="row6_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 6)</label></th>
					<th id="row6_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 6)</label></th>
					<th id="row6_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 6)</label></th>
					<th id="row6_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 6)</label></th>
				</tr>
				<tr>
					<th id="row7_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 7)</label></th>
					<th id="row7_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 7)</label></th>
					<th id="row7_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 7)</label></th>
					<th id="row7_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 7)</label></th>
					<th id="row7_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 7)</label></th>
					<th id="row7_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 7)</label></th>
					<th id="row7_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 7)</label></th>
					<th id="row7_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 7)</label></th>
					<th id="row7_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 7)</label></th>
					<th id="row7_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 7)</label></th>
				</tr>
				<tr>
					<th id="row8_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 8)</label></th>
					<th id="row8_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 8)</label></th>
					<th id="row8_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 8)</label></th>
					<th id="row8_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 8)</label></th>
					<th id="row8_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 8)</label></th>
					<th id="row8_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 8)</label></th>
					<th id="row8_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 8)</label></th>
					<th id="row8_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 8)</label></th>
					<th id="row8_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 8)</label></th>
					<th id="row8_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 8)</label></th>
				</tr>
				<tr>
					<th id="row9_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 9)</label></th>
					<th id="row9_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 9)</label></th>
					<th id="row9_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 9)</label></th>
					<th id="row9_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 9)</label></th>
					<th id="row9_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 9)</label></th>
					<th id="row9_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 9)</label></th>
					<th id="row9_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 9)</label></th>
					<th id="row9_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 9)</label></th>
					<th id="row9_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 9)</label></th>
					<th id="row9_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 9)</label></th>
				</tr>
				<tr>
					<th id="row10_col1" class="battleTile" v-on:click="processClick"><label style="color:grey">(1, 10)</label></th>
					<th id="row10_col2" class="battleTile" v-on:click="processClick"><label style="color:grey">(2, 10)</label></th>
					<th id="row10_col3" class="battleTile" v-on:click="processClick"><label style="color:grey">(3, 10)</label></th>
					<th id="row10_col4" class="battleTile" v-on:click="processClick"><label style="color:grey">(4, 10)</label></th>
					<th id="row10_col5" class="battleTile" v-on:click="processClick"><label style="color:grey">(5, 10)</label></th>
					<th id="row10_col6" class="battleTile" v-on:click="processClick"><label style="color:grey">(6, 10)</label></th>
					<th id="row10_col7" class="battleTile" v-on:click="processClick"><label style="color:grey">(7, 10)</label></th>
					<th id="row10_col8" class="battleTile" v-on:click="processClick"><label style="color:grey">(8, 10)</label></th>
					<th id="row10_col9" class="battleTile" v-on:click="processClick"><label style="color:grey">(9, 10)</label></th>
					<th id="row10_col10" class="battleTile" v-on:click="processClick"><label style="color:grey">(10, 10)</label></th>
				</tr>
			</tbody>
		</table>
		</div>
		<div class="col-sm-3">
		<div v-show="characterSelected">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Character Information
				</div>
				<div class="panel-body">
					<table class="table">
						<tbody>
							<tr>
								<td>Name:</td>
								<td>@{{ characterData[characterSelected_id]['data']['name'] }}</td>
								<td>Class:</td>
								<td>@{{ characterData[characterSelected_id]['data']['class'] }}</td>
							</tr>
							<tr>
								<td>Level</td>
								<td>@{{ characterData[characterSelected_id]['data']['current_lvl'] }}</td>
								<td>Experience</td>
								<td>@{{ characterData[characterSelected_id]['data']['experience'] }}/1000</td>
							</tr>
							<tr>
								<td>Speed</td>
								<td>@{{ characterData[characterSelected_id]['data']['derivedstats']['speed'] }}</td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
					<h2>Equipment</h2>
					<table class="table">
						<tbody>
							<tr>
								<td>Weapon</td>
								<td>@{{ characterData[characterSelected_id]['data']['equipmentslots']['weapon']['name'] }}</td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>

	<modal :show.sync="showModal">
		<div slot="modal-header" class="modal-header">
			<h4 class="modal-title">Move Character</h4>
		</div>
		<div slot="modal-body" class="modal-body">
			<div class="row">
				<pre>C: @{{ toMove_char }}, (@{{ toMove_x }}, @{{ toMove_y }})</pre>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<label>Which character?</label>
					<select type="text" class="form-control" v-model="toMove_char">
					@foreach($character_names as $key => $name)
						<option value="{{ $key }}">{{ $name }}</option>
					@endforeach
					</select>
				</div>
				<div class="col-sm-3">
					<label>X</label>
					<input type="text" class="form-control" v-model="toMove_x" />
				</div>
				<div class="col-sm-3">
					<label>Y</label>
					<input type="text" class="form-control" v-model="toMove_y" />
				</div>
			</div>
		</div>
		<div slot="modal-footer" class="modal-footer">
			<span class="pull-right">
				<button class="btn btn-default" v-on:click="showModal = false">Close</button>
				<button class="btn btn-primary" v-on:click="setLocation">Move</button>
			</span>
		</div>
	</modal>

	<alert
	  :show.sync="showTop"
	  :duration="2000"
	  type="danger"
	  width="400px"
	  placement="top"
	  dismissable>
	  <span class="icon-info-circled alert-icon-float-left"></span>
	  <strong>Out of range</strong>
	  <!-- p>The selected character cannot move that far.</p -->
	</alert>

	<div v-for="character in characterData">
		<label>@{{ character.data['name'] }} @ (@{{ character.locationX }}, @{{ character.locationY }})</label>
	</div>

</div>
@stop

@section('scripts')
	<script type="text/javascript">
	var vm = new Vue({
		el: "#boardScope",
		http: {
	      headers: {
	        'X-CSRF-TOKEN': '{{ csrf_token() }}'
	      }
	    },
		data: {
			showTop: false,
			showRight: false,
			showModal: false,
			turnNumber: 1,
			charactersToMove: {{ count($map_data) }},
			characterSelected: false,
			characterSelected_id: 0,
			characterSelected_x: -1,
			characterSelected_y: -1,
			toMove_char: 1,
			toMove_x: 1,
			toMove_y: 1,
			characterData: [  
				@foreach($map_data as $char_data)
					{ 
						locationX: {!! $char_data['startLocation']['x'] !!},
						locationY: {!! $char_data['startLocation']['y'] !!},
						hasMoved: false,
						data: {!! $char_data['character'] !!}
					 },
				@endforeach
			]
			
		},
		components: {
			sidebar: VueStrap.aside,
			modal: VueStrap.modal,
			alert: VueStrap.alert,
			'rowOne': {
				props: ['row', 'column', 'occupied'],
		      	template: '<th v-on:click="toggleOccupied" class="battleTile" style="color:grey">(@{{ column }}, @{{ row }})</th>',
		      	methods: {
				    notify: function () {
				    	console.log('(' + this.column + ', ' + this.row + ') ' + this.occupied)
				    },
				    toggleOccupied: function() {
				    	this.occupied = !this.occupied,
				    	console.log(this.occupied)
				    },
				  }
		    }
		},
		methods: {
			setLocation: function() {
				this.showModal = false;
				var charToMove = parseInt(this.toMove_char);
				emptyCell('(' + this.characterData[charToMove]['locationX'] + ', ' + this.characterData[charToMove]['locationY'] + ')');
				this.characterData[charToMove]['locationX'] = this.toMove_x;
				this.characterData[charToMove]['locationY'] = this.toMove_y;
				renderAt('(' + this.toMove_x + ', ' + this.toMove_y + ')', this.characterData[charToMove]['data']['icon']);
			},
			cellToConsole: function(e) {
				console.log('cellToConsole: ' + e.target.column);
			},
			advanceTurn: function() {
				this.turnNumber++;
				// for (let [index, charData] of this.characterData) { // For future use
				for (let charData of this.characterData) {
					charData['hasMoved'] = false;
					this.charactersToMove++;
				}
			},
			processClick: function(e) {
				// Check if it's the parent <th> being clicked on, or a child element
				if (e.target.id != '') { 
					var cellID = e.target.id;
				} else {
					var cellID = e.target.parentElement.id;
				}
				// Get location data
				var yLocation = cellID.substring(3, 4);
				var xLocation = cellID.substring(8, 9);
				console.log('e.target: ' + cellID + '. x:' + xLocation + '. y:' + yLocation);

				// Check cell occupation
				var isOccupied = false;
				for (charData of this.characterData) {
			  		if (yLocation == charData['locationY'] && xLocation == charData['locationX']) {
		  				isOccupied = true;
			  			
			  			if(!this.characterSelected) {
			  				this.characterSelected_id = charData['data']['id'] - 1;
			  			} else {
			  				var targetCharacter_id = charData['data']['id'] - 1;
			  			}
			  			
				  	}
				}

				// Where the magic happens
				if (isOccupied) {
					// Always show clicked character's stat panel
					// this.showRight = true; //figure out how to not hide/greyout page

					// Check if character has moved
					if(this.characterData[this.characterSelected_id]['hasMoved']) {
						// has Moved
						return;
					} 

					// There currently is a selected Character
					if (this.characterSelected) {
						// check if same character. True = deselect
						if (yLocation == this.characterSelected_y && xLocation == this.characterSelected_x) {
							$('#' + cellID).removeClass('selectedCell');
							this.characterSelected = false;
							this.characterSelected_x = -1;
							this.characterSelected_y = -1;
							removeInMovementRange();
						} else {
							// check if opposite sides
							// 		if true: check within range
							// 		if true: execute attack
							// else, execute some friendly action

							// Assuming free-for-all atm; all non-self targets viable
							var distance = Math.abs(this.characterSelected_x - xLocation) + Math.abs(this.characterSelected_y - yLocation);
							var range = this.characterData[this.characterSelected_id]['data']['equipmentslots']['weapon']['range'];
							if (distance > range) {
								this.showTop = true;
							} else {
								console.log('I am whacking him!');
								// Post for executing attack server-side
								var form_data = {
									'_token' : '{{ csrf_token() }}',
									'attacker_id': this.characterSelected_id,
									'attacker_pos_x' : this.characterSelected_x, 
									'attacker_pos_y' : this.characterSelected_y,
									'defender_id' : targetCharacter_id,
									'defender_pos_x' : xLocation,
									'defender_pos_y' : yLocation,
									'type' : 'weapon' 
								};

						        this.$http({url: '{{ url("battlemap/ajaxtest") }}', data: form_data, method: 'GET'}).then(function (response) {
						          console.log(response.data);
						          if (response.data == 'Valid') {
						          	console.log('Its Valid');
						          } else if (response.data == 'Invalid') {
						          	this.showTop = true;
						          	console.log('It is not Valid');
						          }
						      }, function (response) {
						          // error callback
						      });
							}
						}

					} else { // There is no selected Character
						this.characterSelected = true;
						this.characterSelected_x = xLocation;
						this.characterSelected_y = yLocation;
						$('#' + cellID).addClass('selectedCell');

						// inMovementRange calculation
						var amountOfRows = 10;
						var amountOfColumns = 10;
						for (var rowIndex = 1; rowIndex <= amountOfRows; rowIndex++) {
							for (var columnIndex = 1; columnIndex <= amountOfColumns; columnIndex++) {
								var distance = Math.abs(columnIndex - xLocation) + Math.abs(rowIndex - yLocation);
								var speed = this.characterData[this.characterSelected_id]['data']['derivedstats']['speed'];
								console.log('Evaluating position ('+columnIndex+', '+rowIndex+') against, speed: ' + speed + ' | distance: ' + distance);
								if (speed >= distance) {
									console.log('Evaluated: True');
									var currentID = 'row' + rowIndex + '_col' + columnIndex;
									if (currentID != cellID) {
										$('#' + currentID).addClass('inMovementRange');
									}
								}
							}
						}
					}
					console.log('Occupied! characterSelected: ' + this.characterSelected + ' (' + this.characterSelected_x + ', ' +this.characterSelected_y + ')');
				} else {
					if (this.characterSelected) {
						// Move cost calculation
						var speed = this.characterData[this.characterSelected_id]['data']['derivedstats']['speed'];
						var cost = Math.abs(this.characterSelected_x - xLocation) + Math.abs(this.characterSelected_y - yLocation);
						if (cost > speed) {
							console.log('Move exceeded speed. Cost: ' + cost);
							// Display alert
							this.showTop = true;
						} else {
							console.log('Move within cost limitation. Cost: ' + cost);
							
							renderAt('(' + xLocation + ', ' + yLocation + ')', this.characterData[this.characterSelected_id]['data']['icon']);
							emptyCell('(' + this.characterSelected_x + ', ' + this.characterSelected_y + ')');

							// Update location data
							this.characterData[this.characterSelected_id]['locationX'] = xLocation;
							this.characterData[this.characterSelected_id]['locationY'] = yLocation;
							this.characterData[this.characterSelected_id]['hasMoved'] = true;

							// The following is just temporary; the character will still need to be able to attack after moving
							this.characterSelected = false;

							removeInMovementRange();
							this.charactersToMove--;
							if (this.charactersToMove <= 0) {
								this.charactersToMove = 0;
								this.advanceTurn();
							}
						}



						console.log('Moved');
					}
					console.log('Clear!');
				}
			},
		}
	});

	function emptyCell(location_string) {
		var xLocation = location_string.substring(1, 2);
		var yLocation = location_string.substring(4, 5);

		var locationID = 'row' + yLocation + '_col' + xLocation;

		$('#' + locationID).html('');
		$('#' + locationID).removeClass('selectedCell');
	}

	function renderAt(location_string, icon_location) {
		var xLocation = location_string.substring(1, 2);
		var yLocation = location_string.substring(4, 5);

		var locationID = 'row' + yLocation + '_col' + xLocation;

		$('#' + locationID).html('<img src="' + icon_location + '" />');
	}

	function removeInMovementRange() {
		$( ".inMovementRange" ).removeClass('inMovementRange');
	}

	$(document).ready(function() {
	    @foreach($map_data as $char_location)
	    	renderAt('(' + {{ $char_location['startLocation']['x'] }} +', ' + {{ $char_location['startLocation']['y'] }} + ')', '{{ $char_location['character']['icon'] }}');
	    @endforeach
	});
	</script>
@stop