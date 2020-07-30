<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExamController;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::namespace('Api')->prefix('v1')->group(function(){
//    Route::get('exams/index', 'ExamController@index');
//});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'v1',
], function () {
    //Route::get('exams/index', 'ExamController@index');
    Route::resource('exams', 'ExamController');
});
