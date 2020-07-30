<?php

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
//
//Route::namespace('Api')->prefix('v1')->group(function(){
//    Route::get('exams/index', 'ExamController@index');
//});

//Route::group([
//    'namespace' => 'Api',
//    'prefix' => 'v1',
//], function () {
//    Route::get('exams/index', 'TestController@index');
//});
