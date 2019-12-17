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

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function() {
    Route::resource('/users', 'UsersController');
    
});

Route::prefix('questions')->name('questions.')->group(function() {
    Route::resource('/question', 'QuestionsController');
    Route::resource('/answer', 'AnswersController');
    Route::resource('/report', 'ReportsController');
    Route::resource('/browse', 'BrowseQuestionsController');
});

Route::resource('/my-questions', 'MyQuestionsController');
Route::resource('/admin/reports', 'ReportsController')->middleware('can:admin');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::get('/search', 'QuestionsController@index');