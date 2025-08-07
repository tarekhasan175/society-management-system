<?php

use Illuminate\Http\Request;

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


Route::group(['middleware' => ['api.token.verify']], function () {
    
    Route::post('dashboard', 'Api\ApiDashboardController@index');


    Route::post('all-users', 'Api\ApiDashboardController@allUserList');


});


// attendance push from client pc of sql 
Route::post('push', 'Api\LogController@push');



Route::post('/login', 'Api\Auth\LoginController@login');
Route::post('loggout', 'Api\Auth\LoginController@loggout');



