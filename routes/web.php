<?php

Route::get('/', function () {
    return view('fileUpload');
});

Route::post('/upload', 'FileController@store')->name('upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

