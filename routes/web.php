<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/api/cards', 'App\Http\Controllers\CardsController@index');
Route::get('/api/cards/{id}', 'App\Http\Controllers\CardsController@show');
Route::get('/api/weddings', 'App\Http\Controllers\CardsController@weddings');
Route::get('/api/birthdays', 'App\Http\Controllers\CardsController@birthdays');
Route::get('/api/baptism', 'App\Http\Controllers\CardsController@baptism');
Route::get('/api/chrism', 'App\Http\Controllers\CardsController@chrism');
Route::get('/api/holidays', 'App\Http\Controllers\CardsController@holidays');
Route::get('/api/miscellaneous', 'App\Http\Controllers\CardsController@miscellaneous');
Route::put('/api/cards/store', 'App\Http\Controllers\CardsController@store');
Route::get('/api/cards/activate/{id}', 'App\Http\Controllers\CardsController@update');

Route::put('/api/contact', 'App\Http\Controllers\ContactController@contact');

Route::get('/api/images/{category_id}', 'App\Http\Controllers\ImageController@getCategoryImages');