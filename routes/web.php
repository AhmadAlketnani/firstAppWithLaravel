<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstContorller;
// use Illuminate\Support\Facades\Redirect;

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
Route::get('myview', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return '<h1>this the first router with laravel  </h1>';
});

// you must enter the valule
Route::get('/test2{name}', function ($name) {
    return '<h1>this the first router with laravel ' . $name . ' </h1>';
});

// you may not enter the valule
Route::get('/test3{name?}', function ($name = null) {
    return '<h1>this the first router with laravel ' . $name . ' </h1>';
});

// the valule must be int
Route::get('/test4{id?}', function ($id = null) {
    return '<h1>this the first router with laravel ' . $id . ' </h1>';
})->where(['id' => '[0-9]+']);

// the valule must be string
Route::get('/test5{name?}', function ($name = null) {
    return '<h1>this the first router with laravel ' . $name . ' </h1>';
})->whereAlpha("name");

// *****************************************************************************


// prefix

// first method

// Route::prefix('settings')->group(function () {

//     Route::get('user', fn () => '<h1>this is group route</h1>' );
//     Route::get('profile', fn () => '<h1>this is group route</h1>' );
// });

// second method

Route::group(['prefix' => 'settings'], function () {

    Route::get('user', fn () => '<h1>this is group route of settings and user </h1>');
    Route::get('profile', fn () => '<h1>this is group route  of settings and profile </h1>');
});

// *****************************************************************************

// redirect if the linke wrong

Route::fallback(function () {

    return redirect('/');
});

// Route::fallback( fn() => redirect('/') );

// Route::fallback( fn() =>  Redirect::to('/') );

// *****************************************************************************

// the Post routes type

Route::get('/sendPost', function () {
    return '<form action="save" method="post">
    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
    <input type="submit" value="send"/>
    </form>';
});


Route::post('/save', function () {
    return '<h1 >I Get The Post Massage </h1>';
});

// *****************************************************************************

// the Put routes type

Route::get('/sendPut', function () {
    return '<form action="myput" method="post">
    <input type="hidden" name="_method" value="put"/>
    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
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
    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
    <input type="submit" value="patch"/>
    </form>';
});

Route::patch('/mypatch', function () {
    return '<h1 >I Get The patch Massage </h1>';
});

// *****************************************************************************

// the Delete routes type

Route::get('/sendDelete', function () {
    return '<form action="mydelete" method="post">
    <input type="hidden" name="_method" value="delete"/>
    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
    <input type="submit" value="delete"/>
    </form>';
});

Route::delete('/mydelete', function () {
    return '<h1 >I Get The Delete Massage </h1>';
});

// *****************************************************************************

// the Options routes type

Route::get('/sendOptions', function () {
    return '<form action="myoptions" method="post">
    <input type="hidden" name="_method" value="options"/>
    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
    <input type="submit" value="options"/>
    </form>';
});

Route::options('/myoptions', function () {
    return '<h1 >I Get The Options Massage </h1>';
});

// *****************************************************************************

// the Any routes type

Route::get('/sendAny', function () {
    return '<form action="myany" method="post">
    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
    <input type="submit" value="any"/>
    </form>';
});


Route::any('/myany', function () {
    return '<h1 >I Get The any Massage </h1>';
});

// *****************************************************************************

// the Match routes type

Route::get('/sendMatch', function () {
    return '<form action="mymatch" method="post">
    <input type="hidden" name="_method" value="delete"/>
    <input type="hidden" name="_token" value="' . csrf_token() . '"/>
    <input type="submit" value="match"/>
    </form>';
});


Route::match(['delete', 'post', 'get'], '/mymatch', function () {
    return '<h1 >I Get The match Massage </h1>';
});

// *****************************************************************************

// give name to the Route

Route::get('myData', fn () => view('mydata'));
Route::post('receiveData', function () {

    return "<h1>I recive the data</h1>";
})->name('receive');

// *****************************************************************************

// Route with controller

// Route::controller(FirstController::class)->group(function () {
//     Route::get('firstCon', 'myview');
// });

// Route::get('firstcon',[FirstController::class,'myview']);

// *****************************************************************************

// Route with contorller and namespace

Route::controller('FirstController')->group(function () {
    Route::get('firstCon', 'myview');
});

Route::get('firstcon','FirstController@myview');

// *****************************************************************************
// domain

Route::domain('pro')->group(function() {
    Route::get('hello', fn() => view('welcome'));
    Route::get('hello1', fn() => 'welcome' );
});

// *****************************************************************************
//
// enum binding

enum Section:String {
    case Phone ="phone" ;
    case Computer ="computer" ;
    case Device ="device" ;
}

Route::get('sections/{section}', fn(Section $section) => $section->value);


