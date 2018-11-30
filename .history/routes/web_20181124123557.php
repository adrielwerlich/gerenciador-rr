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
})->name('mylogin');

Route::middleware('auth')->group(function() {
    Route::get('atualizar-perfil', 'UsersController@edit')->name('users.edit');
    Route::post('meu-perfil', 'UsersController@update')->name('users.update');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Route::get('/', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
    // Route::get('/login', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
    // Route::post('login', 'Auth\LoginController@login')->name('login');
    // Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// });

// Route::group(['namespace' => 'Site', 'prefix' => 'admin'], function () {
//     Route::get('/', 'Auth\LoginController@showLoginForm');
//     Route::post('login', 'Auth\LoginController@login');
//     Route::post('logout', 'Auth\LoginController@logout');
// });