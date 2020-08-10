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
    return redirect('login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/quiz', 'QuizController@index')->name('quiz.index');
Route::get('/quiz/import', 'QuizController@import')->name('quiz.import');
Route::post('/quiz/import', 'QuizController@importSave')->name('quiz.save-import');

