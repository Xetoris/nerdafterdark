<?php

/*
|--------------------------------------------------------------------------
| Change Blade Tags
|--------------------------------------------------------------------------
|
| Polyer and the Blade template engine utilize the '{{ }}' tags. Let's
| change the Blade engine to user another set of tags to avoid
| conflicts.
|
| Source:
| https://scotch.io/quick-tips/quick-tip-using-laravel-blade-with-angularjs
|
*/

Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/nadspodcast', 'ContentController@nadspodcast');
Route::get('/happyhalfhour', 'ContentController@happyhalfhour');
Route::get('/nadsplay', 'ContentController@nadsplay');
Route::get('/live', 'ContentController@live');
