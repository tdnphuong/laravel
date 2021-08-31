<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
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



Route::get('/home', function () {
    return 'Home Page';
});


Route::get('t',  [UserController::class, 'test'] ); 
Route::get('add',  [UserController::class, 'add'] ); 
Route::get('edit/{id}',  [UserController::class, 'edit'] ); 

// Route::get('/user', function () {
//     return view('user.index');
// });

Route::get('index', [UserController::class, 'index'])->name('index');
Route::get('add', [UserController::class, 'add'])->name('add-user');
Route::post('handle-addition', [UserController::class, 'handle_addition'])->name('handle_addition');


Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('handle-edition/{id}', [UserController::class, 'handle_edition'])->name('handle_edition');

Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');

Route::get('search', [UserController::class, 'search'])->name('search');

