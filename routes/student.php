<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('pages.Students.dashboard');
    });

    Route::group(['namespace' => 'Students\dashboard'], function () {
        Route::resource('student_exams', 'ExamsController');
        Route::resource('profile_student', 'ProfileController');

        
        Route::get('/books/{id}', 'BooksController@books')->name('student_books');

        Route::get('/downloadAttachment/{id}', 'BooksController@downloadAttachment')->name('student_downloadAttachment');

        Route::get('/viewAttachment/{file_name}', 'BooksController@viewAttachment')->name('student_viewAttachment');
    });

});
