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

// Route::get('/', function () {
//     return view('auth.login');
// })->name('mylogin');

// Route::get('/', 'Auth\LoginController@showLoginForm')->name('showLoginForm');

// Route::middleware('auth')->group(function() {
//     Route::get('atualizar-perfil', 'UsersController@edit')->name('users.edit');
//     Route::post('meu-perfil', 'UsersController@update')->name('users.update');

// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Route::get('/', function () {
//     return Redirect::action('Auth\LoginController@showLoginForm');
// });

Route::group(['middleware' => ['web','auth']], function () {

    Route::get('/', function () {
            return view('auth.login');  
    });

    Route::get('/solicitar-serviço', 'PanelController@servicesPanelEntryPoint')->name('mainPanelEntry');
    Route::get('/painel-de-serviços', 'PanelController@servicesPanelEntryPoint')->name('mainPanelEntry');

Route::get('{path}', 'PanelController@servicesPanelEntryPoint')->where('path', '([A-z\d-\/_.]+)?' );

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?' );
Route::get('{path}', 'PanelController@servicesPanelEntryPoint')->where('path', '([A-z\d-\/_.]+)?' );

