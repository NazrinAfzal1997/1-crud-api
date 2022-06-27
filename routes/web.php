<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('public')->name('public.')->group(function () {
        Route::get('/get-event',                                     'PublicController@getEvents');
        // Route::get('/create',                               'PublicController@create')->name('create');
        // Route::post('/store',                               'PublicController@store')->name('store');
        // Route::get('/{id}',                                 'PublicController@show')->name('show');
        // Route::get('/{id}/edit',                            'PublicController@edit')->name('edit');
        // Route::post('/update',                              'PublicController@update')->name('update');
        // Route::delete('/delete/{id}',                       'PublicController@destroy');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('events')->name('events.')->group(function () {
            Route::get('/',                                     'EventController@index')->name('index');
            Route::post('/ajax',                                'EventController@getAjax');
            Route::get('/create',                               'EventController@create')->name('create');
            Route::post('/store',                               'EventController@store')->name('store');
            Route::get('/{id}',                                 'EventController@show')->name('show');
            Route::get('/{id}/edit',                            'EventController@edit')->name('edit');
            Route::post('/update',                              'EventController@update')->name('update');
            Route::delete('/delete/{id}',                       'EventController@destroy');
    });

});
