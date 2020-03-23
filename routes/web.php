<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('assets.subGroups.archived');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('group', 'GroupController');

Route::resource('groupDetails', 'GroupDetailsController');

Route::get('/explore', 'GroupController@explore');

Route::get('/in', 'GroupController@assignedGroups');

Route::get('/updateType/{id}/', 'GroupDetailsController@editType');

Route::get('/archived/{id}/', 'GroupDetailsController@archived');

// show all the archived task of individual project
Route::get('/showArchived/{id}/', 'GroupController@showArchived');

// Move archived task to task list
Route::get('/moveArchived/{id}/', 'GroupDetailsController@moveArchived');

Route::get('/updateTypex/{id}/', 'GroupDetailsController@editTypex');

//delete a task from the task dataset
Route::get('/delete/{id}/', 'GroupDetailsController@destroyx');

Route::get('/delreq/{id}/', 'ReqGroupController@delete');

Route::get('/delmem/{id}/', 'GroupMembersController@delmem');

Route::resource('req', 'ReqGroupController');

//to join the group used in accept the request
Route::resource('join', 'GroupMembersController');

//to organize the uploaed file and more
Route::resource('file', 'FileController');

//to approve a file from admin
Route::get('approve/{id}', 'FileController@approve');

Route::get('delete/{id}', 'FileController@delete');
