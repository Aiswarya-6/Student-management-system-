<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
| student APIs routes.
*/
Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'student',
], function () {
    Route::post('create', 'StudentController@create');
    Route::post('update/{studentId}', 'StudentController@update');
    Route::get('view/{studentId}', 'StudentController@read');
    Route::delete('delete/{studentId}', 'StudentController@delete');
    Route::get('list', 'StudentController@List');
});
