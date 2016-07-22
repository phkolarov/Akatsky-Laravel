<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//Route::get('hi', function () {
//   echo "WELCOME";
//});




Route::auth();


Route::group(['middleware' => 'admin'], function () {

    Route::get('test', function () {
        echo '123';
    });



});

Route::group(['middleware' => 'auth'], function () {
//    Route::get('test', function () {
//        echo '123';
//    });

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index');

});



