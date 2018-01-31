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
    return view('index');
});

Route::get('/login/', function () {
    return view('login');
});

Route::get('/logout', function () {
    return view('logout');
});


/*Route::group(['prefix'=>'api/course', function () {
    Route::get('{module_id}/card/{card_id}/response/{canvas_user_id}', 'ResponseController@getResponse');
});*/
