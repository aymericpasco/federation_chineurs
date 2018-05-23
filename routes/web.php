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
})->name('welcome');

Auth::routes(['only' => 'logout']);

Route::get('login/{provider?}', 'Auth\LoginController@redirectToProvider')->name('login.social');
Route::get('login/{provider?}/callback', 'Auth\LoginController@handleProviderCallback');

Route::prefix('dashboard')->group(function () {
    Route::namespace('Team')->prefix('team')->name('team.')->group(function () {
        Route::get('{teamId?}', 'TeamController@show')->name('show');
        Route::get('create', 'TeamController@create')->name('create');
        Route::post('create', 'TeamController@store');
        Route::get('{teamId?}/edit', 'TeamController@edit')->name('edit');
        Route::post('{teamId?}/edit', 'TeamController@update');
        Route::get('{teamId?}/delete', 'TeamController@destroy')->name('delete');

        Route::get('{teamId?}/members', 'UserController@members')->name('members.list');
        Route::name('member.')->group(function () {
            Route::get('{teamId?}/member/{userId}/add', 'UserController@add')->name('add');
            Route::get('{teamId?}/member/{userId}/remove', 'UserController@remove')->name('remove');
        });
    });

    Route::namespace('Project')->prefix('team/{teamId?}/project')->name('project.')->group(function () {
        Route::get('create', 'ProjectController@create')->name('create');
    });
});