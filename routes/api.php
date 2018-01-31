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

Route::group(['prefix'=>'/users/', 'middleware'=>'auth:api'], function () {
    // get routes
    Route::get('{user_id}/courses/', 'CourseController@getCourses');
    Route::get('{user_id}/deadlines/', 'DeadlineController@getDeadlines');
    Route::get('{user_id}/documents/', 'DocumentController@getDocuments');
    // post new items
    Route::post('{user_id}/courses/', 'CourseController@createCourse');
    Route::post('{user_id}/deadlines/', 'DocumentController@createDeadline');
    Route::post('{user_id}/documents/', 'CourseController@createDocument');
    //individual gets
    Route::get('{user_id}/courses/{course_id}', 'CourseController@getCourseById');
});