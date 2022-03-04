<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

/*
| student  routes.
*/
Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'student',
], function () {
    Route::post('create', 'StudentController@create');
    Route::get('insert', 'StudentController@insert');
    Route::post('update/{studentId}', 'StudentController@update');
    Route::get('edit/{studentId}', 'StudentController@edit');
    Route::get('delete/{studentId}', 'StudentController@delete');
    Route::get('list', 'StudentController@List');
});


/*
| student marks  routes.
*/
Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'marks',
], function () {
    Route::post('create', 'StudentMarksController@create');
    Route::get('insert', 'StudentMarksController@insert');
    Route::post('update/{StudentMarksId}', 'StudentMarksController@update');
    Route::get('edit/{StudentMarksId}', 'StudentMarksController@edit');
    Route::get('delete/{StudentMarksId}', 'StudentMarksController@delete');
    Route::get('list', 'StudentMarksController@List');
});
