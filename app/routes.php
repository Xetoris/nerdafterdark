<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'IndexController@Index');
Route::get('/podcasts', 'PodcastController@Latest');
Route::get('/podcasts/archived', 'PodcastController@Archived');
Route::get('/registration', 'UserController@GetRegistrationForm');
Route::post('/registration/save', 'UserController@SaveRegistration');
//Route::get('/fancy', 'IndexController@FancyIndex');
//Route::get('/testbinding', 'HomeController@showWelcome');