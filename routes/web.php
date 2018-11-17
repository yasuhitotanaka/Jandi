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

Route::get('/', 'postsController@index');

Route::get('/create', 'postsController@create');
Route::post('/create', 'postsController@store');

Route::get('/post/{post_id}', 'postsController@show');

Route::get('/post/{post_id}/comment', 'commentsController@create');
Route::post('/post/{post_id}/comment', 'commentsController@store');
