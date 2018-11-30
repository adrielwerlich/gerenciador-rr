<?php

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
    return view('auth.login');
})->name('home');

Route::middleware('auth')->group(function() {
    Route::get('atualizar-perfil', 'UsersController@edit')->name('users.edit');
    Route::post('meu-perfil', 'UsersController@update')->name('users.update');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
