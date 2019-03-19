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

Auth::routes();

// Qeustion Controllers
Route::resource('questions', 'QuestionsController')->except(['show', 'edit']);
Route::get('/questions/{slug}', 'QuestionsController@show')->name("questions.show");
Route::get('/questions/{slug}/edit', 'QuestionsController@edit')->name("questions.edit");

// Answer Controllers --- alternatively can use Laravel nested controller
Route::post('/questions/{question}/answers', 'AnswersController@store')->name('answers.store');
Route::delete('/questions/{question}/answers/{answer}', 'AnswersController@store')->name('answers.delete');
Route::put('/questions/{question}/answers/{answer}', 'AnswersController@update')->name('answers.update');
Route::post('/questions/{question}/answers/{answer}/edit', 'AnswersController@edit')->name('answers.edit');
