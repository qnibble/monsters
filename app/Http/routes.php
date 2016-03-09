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
Route::get('battlemap/ajaxtest', 'BattlemapController@returnAjax');

Route::resource('effects', 'EffectController');

Route::resource('items', 'ItemController');

Route::any('character/data', ['as' => 'character.data', 'uses' => 'CharacterController@anyData']);

Route::resource('character', 'CharacterController');

Route::resource('ability', 'AbilityController');

Route::resource('armour', 'ArmourController');

Route::resource('weapon', 'WeaponController');

// Route::controller('')