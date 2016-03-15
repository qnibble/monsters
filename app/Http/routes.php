<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', 'AdminController@Index');

Route::get('battlemap', 'BattlemapController@index');
// Route::get('battlemap/ajaxtest', 'BattlemapController@returnAjax');
Route::get('battlemap/validatemove', 'BattlemapController@validateMove');
Route::get('battlemap/validateaction', 'BattlemapController@validateAction');

Route::resource('effects', 'EffectController', ['except' => 'edit']);

Route::resource('items', 'ItemController', ['except' => 'edit']);

Route::any('character/data', ['as' => 'character.data', 'uses' => 'CharacterController@anyData']);

Route::resource('character', 'CharacterController', ['except' => 'edit']);

Route::resource('ability', 'AbilityController', ['except' => 'edit']);

Route::resource('armour', 'ArmourController', ['except' => 'edit']);

Route::resource('weapon', 'WeaponController', ['except' => 'edit']);

Route::resource('mapdata', 'MapdataController', ['except' => 'edit']);

// Route::controller('')