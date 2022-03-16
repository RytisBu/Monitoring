<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;

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
//middleware('auth:api')->
Route::get('/user/{$id}', function (Request $request) {
    return $request->user();
});

Route::post('v1', 'UserController@getUser');

//Route::controller(UserController::class)->group(function () {
//    Route::get('/user', [UserController::class, 'getUser']);
////    dd('stop');
//
////    Route::get('/user/{id}', 'getUser');
//});
