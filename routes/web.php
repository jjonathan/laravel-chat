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
		$user->messages()->create([
			'message' => request()->get('message')
		]);

		//Annouces that a new message has been posted
		event(new MessagePosted());

		return ['status' => 'OK'];
	});
});