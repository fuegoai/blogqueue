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
    return view('welcome');
});

Route::get('/', 'HomeController@index');
Route::get('/notify', 'HomeController@notify');
Route::get('/report', 'HomeController@report');
Route::get('/send', 'HomeController@send');

Route::get('/slack', function () {
$user = App\User::first();
$user->notify(new Newslack());
   echo "A slack notification has been send";
});
