<?php

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\PinHistory;

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


Route::get('pin', 'PinController@getAllPins');
Route::get('pin/{id}', 'PinController@getPin');
Route::post('pin', 'PinController@createPin');
Route::put('pin/{id}', 'PinController@updatePin');
Route::delete('pin/{id}', 'PinController@deletePin');

Route::get('pin/{id}/history', 'PinHistoryController@getPinHistoryListForPin');
Route::get('pinhistory', 'PinHistoryController@listAllPinHistories');
Route::get('pinhistory/{id}', 'PinHistoryController@getPinHistory');
