<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Controller;
use \App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RegistrationController;
use App\Http\Controllers\Systems\SystemController;
use App\Http\Controllers\Complaints\ComplaintController;

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
    Route::prefix('profile')->group(function() {
        Route::get('/', [UserController::class, 'profile'])->name('profile.show');
        Route::get('/edit={id}', [UserController::class, 'editProfile'])->name('profile.edit');
        Route::post('/edit', [UserController::class, 'updateProfile'])->name('profile.store');
    });

    Route::middleware(['auth'])->prefix('users')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('user.list');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/create', [UserController::class, 'store'])->name('user.store');
        Route::get('/show={id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/delete={id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/edit={id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit={id}', [UserController::class, 'update'])->name('user.update');
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

    Route::middleware(['auth'])->prefix('complaints')->group(function() {
        Route::match(array('GET'), '/', [ComplaintController::class, 'index'])->name('complaint.list');
        Route::get('/create', [ComplaintController::class, 'create'])->name('complaint.create');
        Route::post('/create', [ComplaintController::class, 'store'])->name('complaint.store');
        Route::get('/show={id}', [ComplaintController::class, 'show'])->name('complaint.show');
        Route::get('/edit={id}', [ComplaintController::class, 'edit'])->name('complaint.edit');
        Route::post('/edit={id}', [ComplaintController::class, 'update'])->name('complaint.update');
        Route::get('/delete={id}', [ComplaintController::class, 'destroy'])->name('complaint.destroy');
    });

    Route::get('/complaints/getList', [ComplaintController::class, 'getList']);
    Route::get('/systems/getList', [SystemController::class, 'getList']);
    Route::withoutMiddleware([VerifyCsrfToken::class])->get('/logout', [AuthController::class, 'logout'])->name('logout');
});
