<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Controller;
use \App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RegistrationController;
use App\Http\Controllers\Systems\SystemController;
use Illuminate\Http\Request;
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
Route::get('/', [Controller::class, 'index'])->name('main');

Route::middleware(['guest'])->group(function () {
    Route::post('/register', [RegistrationController::class, 'create'])->name('user.register');
    Route::get('/register', [RegistrationController::class, 'index'])->name('user.register');
    Route::post('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth'])->prefix('profile')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('profile.show');
        Route::get('/edit', [UserController::class, 'store'])->name('profile.edit');
        Route::post('/edit', [UserController::class, 'store'])->name('profile.store');
    });

    Route::middleware(['auth'])->prefix('systems')->group(function() {
        Route::match(array('GET', 'POST'), '/', [SystemController::class, 'index'])->name('system.list');
        Route::get('/create', [SystemController::class, 'create'])->name('system.create');
        Route::post('/create', [SystemController::class, 'store'])->name('system.store');
        Route::get('/show={id}', [SystemController::class, 'show'])->name('system.show');
        Route::get('/edit={id}', [SystemController::class, 'edit'])->name('system.edit');
        Route::post('/edit={id}', [SystemController::class, 'update'])->name('system.update');
        Route::get('/delete={id}', [SystemController::class, 'destroy'])->name('system.destroy');
    });
});



//Route::get('/user/{$id}', [UserController::class, 'getUser'], function ($id){
//
//});
Route::controller(UserController::class)->group(function () {
    Route::get('/user/{filter}/{value}', 'getUser');
});


//Route::withoutMiddleware([VerifyCsrfToken::class])->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::withoutMiddleware([VerifyCsrfToken::class])->get('/logout', [AuthController::class, 'logout'])->name('logout');
