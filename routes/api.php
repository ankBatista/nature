<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::resource('cliente', 'App\Http\Controllers\ClienteController');
Route::prefix('v1')->middleware('jwt.auth')->group(function() {
    Route::apiResource('index', 'App\Http\Controllers\HomePageController');
    Route::apiResource('company', 'App\Http\Controllers\CompanyController');
    Route::apiResource('update', 'App\Http\Controllers\UpdateController');
    Route::apiResource('members', 'App\Http\Controllers\MemberController');
    Route::apiResource('logs', 'App\Http\Controllers\LogRecordingController');



    Route::apiResource('about', 'App\Http\Controllers\AboutUsController');
    Route::apiResource('subscribe', 'App\Http\Controllers\SubscribedController');

    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    


});
Route::get('index', 'App\Http\Controllers\HomePageController@index');

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');



