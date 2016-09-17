<?php

Route::resource('flyers','FlyersController');
Route::get('{zip_code}/{street}', 'FlyersController@show');
Route::post('{zip_code}/{street}/photos', ['as'=>'store_photo_path', 'uses'=>'FlyersController@addPhotos']);

Route::auth();

Route::get('/', 'PagesController@index');
Route::get('/home', 'HomeController@index');

Route::delete('photos/{id}', 'PhotosController@destroy');
