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

Route::group(['prefix'=>'/user/', 'middleware'=>'auth:api'], function () {
    // get routes
    Route::get('courses/', 'CourseController@getCourseList');
    Route::get('deadlines/', 'DeadlineController@getDeadlines');
    Route::get('documents/', 'DocumentController@getDocuments');
    // post new items
    Route::post('courses/', 'CourseController@createCourse');
    Route::post('deadlines/', 'DocumentController@createDeadline');
    Route::post('documents/', 'CourseController@createDocument');
    //individual gets
    Route::get('courses/{course_id}', 'CourseController@getCourseById');
    // TODO: file upload API client
});