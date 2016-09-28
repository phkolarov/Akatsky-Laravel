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


Route::group(['middleware' => 'web'], function () {

    Route::get('/',  'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/videos', 'VideosController@index');
    Route::get('/videos/{filter}', 'VideosController@filtered');
    Route::get('/video/{id}/{title}', 'VideosController@currentVideo');
    Route::get('/articles', 'ArticlesController@index');
    Route::get('/article/{id}/{title}', 'ArticlesController@currentArticle');
    Route::get('/articles/{filter}', 'ArticlesController@filtered');
    Route::get('/about-us', 'HomeController@aboutUs');
    Route::get('/favoritesPublic', 'FavoritesController@index');
    Route::get('/favoritesRegister', 'FavoritesController@authenticated');
    Route::get('/search/{searchedContent}', 'SearchController@liveSearch');
    Route::get('/search', 'SearchController@searchPage');

    //DATA
    Route::post('/sendMessage', 'HomeController@sendMessage');
    Route::post('/favorites/getPublicFavoriteVideos', 'FavoritesController@getPublicFavoriteVideos');
    Route::post('/favorites/getPublicFavoriteArticles', 'FavoritesController@getPublicFavoriteArticles');

});



Route::group(['middleware' => 'auth'], function () {

    Route::get('/store', 'StoreController@index');
});


Route::get('/admin', 'AdminController@index')->middleware('admin');




Route::get('/articleTest', 'ArticlesController@test');




Route::auth();

