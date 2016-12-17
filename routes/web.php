<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/add_friend', function(){
    return \App\User::find(5)->add_friend(4);
});

Route::get('/accept_friend', function(){
    return \App\User::find(2)->accept_friend(1);
});

Route::get('/pending_friends', function(){
    return \App\User::find(4)->pending_friend_requests();
});

Route::get('/ids', function(){
    return \App\User::find(4)->friends_ids();
});

Route::get('/is', function(){
    return \App\User::find(1)->is_friends_with(5);
});


Route::get('/has', function(){
    return \App\User::find(1)->has_pending_friend_requests_from(2);
});




Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);

    Route::get('/profile/edit/profile', [
        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('/profile/update/profile', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);
});