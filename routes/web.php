<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/{user_id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user_id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/mail', [App\Http\Controllers\MailController::class, 'index'])->name('mail');