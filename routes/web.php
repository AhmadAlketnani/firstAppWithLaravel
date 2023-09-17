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


// the get routes type

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return '<h1>this the first router with laravel  </h1>';
});

// you must enter the valule
Route::get('/test2{name}', function ($name) {
    return '<h1>this the first router with laravel '. $name .' </h1>';
});

// you may not enter the valule
Route::get('/test3{name?}', function ($name = null) {
    return '<h1>this the first router with laravel '. $name .' </h1>';
});

// the valule must be int
Route::get('/test4{id?}', function ($id = null) {
    return '<h1>this the first router with laravel '. $id .' </h1>';
})->where(['id' => '[0-9]+']);

// the valule must be string
Route::get('/test5{name?}', function ($name = null) {
    return '<h1>this the first router with laravel '. $name .' </h1>';
})->whereAlpha("name");

// *****************************************************************************

// the Post routes type

Route::get('/sendPost', function () {
    return '<form action="save" method="post">
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="send"/>
    </form>';
});

Route::post( '/save', function() {
    return '<h1 >I Get The Post Massage </h1>';
});

// *****************************************************************************

// the Put routes type

Route::get('/sendPut', function () {
    return '<form action="myput" method="post">
    <input type="hidden" name="_method" value="put"/>
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="put"/>
    </form>';
});

Route::put('myput', function () {
    return '<h1 >I Get The Put Massage </h1>';
});

// *****************************************************************************

// the Patch routes type

Route::get('/sendPatch', function () {
    return '<form action="mypatch" method="post">
    <input type="hidden" name="_method" value="patch"/>
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="patch"/>
    </form>';
});

Route::patch( '/mypatch', function() {
    return '<h1 >I Get The patch Massage </h1>';
});

// *****************************************************************************

// the Delete routes type

Route::get('/sendDelete', function () {
    return '<form action="mydelete" method="post">
    <input type="hidden" name="_method" value="delete"/>
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="delete"/>
    </form>';
});

Route::delete( '/mydelete', function() {
    return '<h1 >I Get The Delete Massage </h1>';
});

// *****************************************************************************

// the Options routes type

Route::get('/sendOptions', function () {
    return '<form action="myoptions" method="post">
    <input type="hidden" name="_method" value="options"/>
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="options"/>
    </form>';
});

Route::options( '/myoptions', function() {
    return '<h1 >I Get The Options Massage </h1>';
});

// *****************************************************************************

// the Any routes type

Route::get('/sendAny', function () {
    return '<form action="myany" method="post">
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="any"/>
    </form>';
});


Route::any( '/myany', function() {
    return '<h1 >I Get The any Massage </h1>';
});

// *****************************************************************************

// the Match routes type

Route::get('/sendMatch', function () {
    return '<form action="mymatch" method="post">
    <input type="hidden" name="_method" value="delete"/>
    <input type="hidden" name="_token" value="'. csrf_token() .'"/>
    <input type="submit" value="match"/>
    </form>';
});


Route::match( ['delete' , 'post' , 'get'],'/mymatch', function() {
    return '<h1 >I Get The match Massage </h1>';
});

// *****************************************************************************





