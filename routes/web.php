<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send', function () {
    return '<form action="save" method="post">
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="send"/>
    </form>';
});

Route::post( '/save', function() {
    return '<h1 >I Get The Massage </h1>';
});


Route::get('/test', function () {
    return '<h1>this the first router with laravel  </h1>';
});

Route::get('/test2{name}', function ($name) {
    return '<h1>this the first router with laravel '. $name .' </h1>';
});

Route::get('users/{id}', function ($id) {

});


