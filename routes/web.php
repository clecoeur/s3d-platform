<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/signin', [AuthenticationController::class, 'loginForm'])
    ->name('login')
    ->middleware(['web', 'guest']);


Route::post('/signin', [AuthenticationController::class, 'store'])
    ->name('login')
    ->middleware(['web', 'guest']);

Route::post('/logout', [AuthenticationController::class, 'logout'])
    ->name('logout')
    ->middleware(['web', 'auth']);
*/
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware(['web','guest']);

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['web','guest']);

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/{id}', [ProjectController::class, 'view'])
    ->name('detail')
    ->middleware(['web','auth', 'verified']);


Route::get('/', [ProjectController::class, 'index'])
    ->name('dashboard')
    ->middleware(['web', 'auth', 'verified']);



//require __DIR__.'/auth.php';
