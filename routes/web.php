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

Route::get('/home', 'HomeController@index')->name('home');

Route::name('articles.')
    ->prefix('articles')
    ->group(function() {
        Route::get('/', 'ArticlesController@index')->name('home');

        Route::get('{slug}/delete', 'ArticlesController@destroy')->name('delete');
        Route::get('{slug}/edit', 'ArticlesController@edit')->name('edit');
        Route::post('{slug}/update', 'ArticlesController@update')->name('update');
        Route::get('new', 'ArticlesController@create')->name('create');
        Route::post('save', 'ArticlesController@store')->name('store');

        Route::get('{slug}', 'ArticlesController@view')->name('view');
        Route::post('{slug}', 'ArticlesController@comment')->name('comment');
    });
