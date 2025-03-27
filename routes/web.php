<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sauces', 'App\Http\Controllers\SaucesController@index')->name('sauces.index');
Route::get('sauces/create', 'App\Http\Controllers\SaucesController@create')->name('create');
Route::post('sauces', 'App\Http\Controllers\SaucesController@store')->name('sauces.store');
Route::get('sauces/edit/{id}', 'App\Http\Controllers\SaucesController@edit')->name('edit');
Route::put('sauces.update/{id}', 'App\Http\Controllers\SaucesController@update')->name('sauces.update');
Route::get(('sauces/{id}'), 'App\Http\Controllers\SaucesController@show');
Route::get('sauces/delete/{id}', 'App\Http\Controllers\SaucesController@destroy')->name('sauces.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
