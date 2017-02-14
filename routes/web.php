<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function(){
	//Route di isi disini
	Route::resource('authors', 'AuthorsController');
	Route::resource('books', 'BooksController');
	Route::resource('members', 'MembersController');
	
	//untuk menampilkan daftar peminjaman
	Route::get('statistics', [
			'as'		=> 'statistics.index',
			'uses'		=> 'StatisticsController@index'
		]);

	//Untuk export excel
	Route::get('export/books', [
			'as' 	=> 'export.books',
			'uses'	=> 'BooksController@export'
		]);
	Route::post('export/books', [
			'as'	=> 'export.books.post',
			'uses'	=> 'BooksController@exportPost'
		]);

	//Import data dari excel
	Route::get('template/books', [
			'as'	=> 'template.books',
			'uses'	=> 'BooksController@generateExcelTemplate'
		]);
	Route::post('import/books', [
			'as'	=> 'import.books',
			'uses'	=> 'BooksController@importExcel'
		]);
});

Route::get('books/{book}/borrow', [
		'middleware'	=> ['auth', 'role:member'],
		'as'			=> 'guest.books.borrow',
		'uses'			=> 'BooksController@borrow'
	]);

Route::put('books/{book}/return', [
		'middleware'	=> ['auth', 'role:member'],
		'as'			=> 'member.books.return',
		'uses'			=> 'BooksController@returnBack'
	]);

Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');

Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');

Route::get('settings/profile', 'SettingsController@profile');

Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');

Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');