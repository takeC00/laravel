<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RoomController;
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
  return Inertia::render('Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ROOM
//resoucesだと、rooms/1/edit　のような形だったので、 rooms/1/edit　となるよう修正。
Route::get('/rooms/edit/{id}', [RoomController::class, 'edit']);

Route::resource('rooms', RoomController::class);


//  コントローラーが複数ある場合は
//  Route::resouces([
//    'Rooms' => RoomController::class,
//    'User' => Usercontroller::class,
//  ]);


//USER





require __DIR__.'/auth.php';
