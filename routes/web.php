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


Route::get('/', 'index@home');
Route::get('/main', 'index@main');


Route::get('/logUser', "login@logUser");
Route::get('/login', 'login@redirect');
Route::get('/logout', 'login@logout');
Route::get('/delete', 'deleteController@deleteUser');
Route::get('/deleteAccount', 'deleteController@deleteAccount');
Route::get('/modify', 'modifyController@showProfile');
Route::get('/addUser', 'register@registerUser');
Route::get('/addMovies', "filmsController@addMovies");
Route::get('/displayMovies', "filmsController@displayMovies");
Route::get('/displayMovie', "filmsController@displayMovie");

Route::get('/addFavorites', 'filmsController@addFavorites');
Route::get('/addLater', 'filmsController@addLater');
Route::get('/displayFavorite', 'filmsController@displayFavorite');
Route::get('/displayLater', 'filmsController@displayLater');
Route::get('/removeLater', 'filmsController@removeLater');
Route::get('/removeFavorite', 'filmsController@removeFavorite');

Route::post('/addMovies', "filmsController@createMovie");
Route::post('/home', 'register@create');
Route::post('/login', 'login@login');
Route::post('/modify', 'modifyController@modifyAccount');
Route::post('/addUser', 'register@addUser');
