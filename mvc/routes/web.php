<?php

use App\Routes\Route;
use App\Controllers\HomeController;
use App\Controllers\LivreController;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


Route::get('/livres', 'LivreController@index');
Route::get('/livre/show', 'LivreController@show');
Route::get('/livre/create', 'LivreController@create');
Route::post('/livre/create', 'LivreController@store');
Route::get('/livre/edit', 'LivreController@edit');
Route::post('/livre/edit', 'LivreController@update');
Route::get('/livre/delete', 'LivreController@delete');

Route::dispatch();
