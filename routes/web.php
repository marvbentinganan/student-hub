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
    return redirect('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
	Route::get('/timeline', 'HomeController@index')->name('timeline');
	Route::get('/profile', 'ProfileController@index')->name('profile');
	
	Route::get('/user-management', 'UserController@index')->name('addUsers');
	Route::post('/import-users', 'UserController@store')->name('uploadUsers');
	Route::post('/add-user', 'UserController@create')->name('addNewUser');
	Route::get('/user-access', 'SettingController@userAccess')->name('userAccess');
	Route::post('/add-navigation', 'NavigationController@store')->name('addNav');
	Route::post('/migrate-shs', 'UserController@migrateSHS')->name('migrateSHS');

	Route::get('get-all-posts', 'PostController@posts')->name('allPosts');
	Route::post('add-post', 'PostController@store')->name('addPost');
	Route::get('posts/{id}/view', 'PostController@show')->name('showPost');
	Route::get('get-post', 'PostController@getPost')->name('getPost');

	Route::post('/add-comment', 'CommentController@store')->name('addComment');

	Route::get('/account-settings', 'SettingController@accountIndex')->name('accountSettings');
	Route::post('/update-account', 'SettingController@accountUpdate')->name('accountUpdate');
	Route::get('/global-settings', 'SettingController@globalIndex')->name('globalSettings');
	Route::post('/update-global', 'SettingController@globalUpdate')->name('globalUpdate');
});

