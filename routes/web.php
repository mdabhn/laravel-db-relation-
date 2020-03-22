<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('assets.group.urequest');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('group', 'GroupController');

Route::resource('groupDetails', 'GroupDetailsController');

Route::get('/explore', 'GroupController@explore');

Route::get('/in', 'GroupController@assignedGroups');

Route::get('/updateType/{id}/', 'GroupDetailsController@editType');

Route::get('/updateTypex/{id}/', 'GroupDetailsController@editTypex');

Route::get('/delete/{id}/', 'GroupDetailsController@destroyx');

Route::get('/delreq/{id}/', 'ReqGroupController@delete');

Route::get('/delmem/{id}/', 'GroupMembersController@delmem');

Route::resource('req', 'ReqGroupController');

//to join the group used in accept the request
Route::resource('join', 'GroupMembersController');
