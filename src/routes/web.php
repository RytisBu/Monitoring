<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Controller;
use \App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RegistrationController;
use App\Http\Controllers\Systems\SystemController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test', function() {
    return view('test');
});

Route::get('/', [Controller::class, 'index'])->name('main');

Route::post('/register', [RegistrationController::class, 'create'])->name('user.register');
Route::get('/register', [RegistrationController::class, 'index'])->name('user.register');
Route::post('/login', [AuthController::class, 'index'])->name('login');//withoutMiddleware([VerifyCsrfToken::class])->
Route::get('/login', [AuthController::class, 'index'])->name('login');//withosutMiddleware([VerifyCsrfToken::class])->
//Route::get('/profile/detail', [UserController::class, 'index'])->name('profile.show');//withosutMiddleware([VerifyCsrfToken::class])->
//Route::withoutMiddleware([VerifyCsrfToken::class])->post('/profile/edit', [UserController::class, 'store'])->name('profile.store');

Route::prefix('profile')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('profile.show');
    Route::get('/edit', [UserController::class, 'store'])->name('profile.edit');
//    Route::match(['get', 'post'], '/store', [UserController::class, 'store'])->name('profile.store');
    Route::post('/edit', [UserController::class, 'store'])->name('profile.store');
//    Route::get('/save', [UserController::class, 'store'])->name('profile.store');
});

Route::prefix('systems')->group(function() {
//    Route::get('/', [SystemController::class, 'index'])->name('system.list');
    Route::get('/{orderBy?}/{orderType?}', [SystemController::class, 'index'])->name('system.list');
//    Route::get('/edit', [SystemController::class, 'store'])->name('profile.edit');
//    Route::post('/edit', [SystemController::class, 'store'])->name('profile.store');
});

//Route::get('/user/{$id}', [UserController::class, 'getUser'], function ($id){
//
//});
Route::controller(UserController::class)->group(function () {
    Route::get('/user/{filter}/{value}', 'getUser');
});


//Route::withoutMiddleware([VerifyCsrfToken::class])->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::withoutMiddleware([VerifyCsrfToken::class])->get('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::/*middleware(['first', 'second'])->*/group(function () {
//    Route::get('/', function () {
//        // Uses first & second middleware...
//    });
//
//    Route::get('/user/profile', function () {
//        // Uses first & second middleware...
//    });
//});
