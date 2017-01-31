<?php

use App\Events\MessagePosted;

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function(){
	Route::get('/messages', function(){
		return App\Message::all()->load('user');
	});	

	Route::get('/', function () {
		return view('chat');
	});

	Route::post('/messages', function(){
		$user = Auth::user();
		$message = $user->messages()->create([
			'message' => request()->get('message')
		]);

    // Announce that a new message has been posted
    broadcast(new MessagePosted($message, $user))->toOthers();

		return ['status' => 'OK'];
	});
});

