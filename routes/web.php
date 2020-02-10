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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    // User NOT NEEDED BECAUSE I USED LARAVEL BUILD IN USER AUTH
//    Route::post('SignUp', 'UsersController@SignUp');
//    Route::get('SignUp', 'UsersController@SignIn');

    // Note
    Route::get('newNote', 'NotesController@newNote')->name('pages.newNote');
    Route::post('createANote', 'NotesController@createANote')->name('createNewNote');
    Route::post('updateNote', 'NotesController@updateNote')->name('updateNote');
    Route::get('deleteNote/{id}', 'NotesController@deleteNote')->name('deleteNote');
    Route::get('searchForNote', 'NotesController@searchNote')->name('search');
    Route::get('openNote/{id}', 'NotesController@openNote')->name('pages.openNote');

    Route::get('/', 'NotesController@allNotes');
    Route::get('home', 'NotesController@allNotes')->name('home');
    Route::get('Home', 'NotesController@allNotes')->name('Home');


});



