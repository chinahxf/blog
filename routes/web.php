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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
//    index
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/getArticleList', 'ArticleController@getArticleList');
        Route::get('/addArticle', 'ArticleController@addArticle');

        Route::get('/', 'ArticleController@index');
        Route::post('/', 'ArticleController@create');
    });
    Route::get('/users', 'UserController@index');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index');
    });
});
Route::group(['middleware' => 'auth', 'prefix' => 'common', 'namespace' => 'Common'], function () {

        Route::get('/getCategory', 'CommonController@getCategory');
});