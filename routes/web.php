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
    return view('welcome');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('/users', 'UsersController');
});

Route::prefix('questions')->name('questions.')->group(function() {
    Route::resource('/question', 'QuestionsController');
    Route::resource('/answer', 'AnswersController');
    Route::resource('/answer/comments', 'CommentsController');
});

Route::resource('/my-questions', 'MyQuestionsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
