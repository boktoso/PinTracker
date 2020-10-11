<?php

use Illuminate\Http\Request;
use App\Models\Pin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('pin', 'PinController@index');
Route::get('pin/{pin}', 'PinController@show');
Route::post('pin', 'PinController@store');
Route::put('pin/{pin}', 'PinController@update');
Route::delete('pin/{pin}', 'PinController@delete');

Route::get('pin/{pin}/history', 'PinHistoryController@getForPinByPin');
Route::get('pinhistory', 'PinHistoryController@index');
Route::get('pinhistory/{pinhistory}', 'PinHistoryController@show');
