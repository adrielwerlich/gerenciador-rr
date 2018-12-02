<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::delete('api/users/{id}', 'API\UserController@destroy');  

Route::apiResources(['tipos-de-servico' => 'API\TiposDeServicoApiController']);
Route::apiResources(['users-list' => 'API\UsersApiController']);

Route::post('require-job', 'API\JobsApiController@requireJob');

Route::get('current-user-profile', 'API\UsersApiController@currentUserProfile')->middleware('api');
Route::put('profile', 'API\UsersApiController@updateProfile');

// Route::get('profile', 'API\UserController@profile');
// Route::put('profile', 'API\UserController@updateProfile');