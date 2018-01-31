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

Route::get('/', 'Controller@getHomepage');

/*Route::group(['prefix'=>'api/course', function () {
    Route::get('{module_id}/card/{card_id}/response/{canvas_user_id}', 'ResponseController@getResponse');
});*/

Auth::routes();

Route::get('/dashboard', 'HomeController@getDashboard')->name('dashboard');
