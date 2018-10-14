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
Route::get('add','UserController@create');
Route::post('add','UserController@store');
Route::get('car','UserController@index');
Route::get('edit/{id}','UserController@edit');
Route::post('edit/{id}','UserController@update');
Route::delete('{id}','UserController@destroy');
Route::get('login','UserController@login');
Route::post('login','UserController@login');
Route::get('logout','UserController@logout');
Route::post('logout','UserController@logout');
Route::get('userdetails','UserController@returndetails');
Route::post('userdetails','UserController@returndetails');
Route::get('dashboard','UserController@loaddashboard');
Route::post('dashboard','UserController@loaddashboard');
Route::get('postarticle','ArticlesController@postnewsui');
Route::post('postarticle','ArticlesController@postnewsui');
Route::get('viewposts','ArticlesController@viewposts');
Route::post('viewposts','ArticlesController@viewposts');
Route::get('viewusers','UserController@returnusers');
Route::post('viewusers','UserController@returnusers');
Route::get('viewposts/{id}','ArticlesController@displayPost');
Route::get('deletepost/{id}','ArticlesController@deleteArticle');
Route::post('storearticle','ArticlesController@StorePost');
Route::get('sendrequest/{id}','UserController@sendFriendRequest');
Route::post('sendrequest/{id}','UserController@sendFriendRequest');
Route::get('/', 'UserController@welcome');
Route::post('/', 'UserController@welcome');
