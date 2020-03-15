<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('assets.group.edit');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('group', 'GroupController');

Route::resource('groupDetails', 'GroupDetailsController');

Route::get('/explore', 'GroupController@explore');
