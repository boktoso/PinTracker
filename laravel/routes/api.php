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


Route::middleware('cors')->get('pin', 'PinController@getAllPins');
Route::middleware('cors')->get('pin/{id}', 'PinController@getPin');
Route::middleware('cors')->post('pin', 'PinController@createPin');
Route::middleware('cors')->put('pin/{id}', 'PinController@updatePin');
Route::middleware('cors')->delete('pin/{id}', 'PinController@deletePin');

Route::middleware('cors')->get('pin/{id}/history', 'PinHistoryController@getPinHistoryListForPin');
Route::middleware('cors')->get('pinhistory', 'PinHistoryController@listAllPinHistories');
Route::middleware('cors')->get('pinhistory/{id}', 'PinHistoryController@getPinHistory');
