<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecurityController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/users_with_role');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/users_with_role', [SecurityController::class, 'index']
)->name('users_with_role');

Route::middleware(['auth:sanctum', 'verified'])->get('/admins', [SecurityController::class, 'admins']
)->name('admins');

Route::middleware(['auth:sanctum', 'verified'])->get('/permission', [SecurityController::class, 'permission']
)->name('permission');
