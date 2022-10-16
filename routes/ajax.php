<?php

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::group(['middleware' => 'auth:teacher,web'], function () {
    Route::get('/Get_classrooms/{id}', 'AjaxController@getClassrooms');
    Route::get('/Get_Sections/{id}', 'AjaxController@Get_Sections');
});
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher,web']
    ], function () {
    Route::get('/Get_classrooms/{id}', 'AjaxController@getClassrooms');
    Route::get('/Get_Sections/{id}', 'AjaxController@Get_Sections');
});
