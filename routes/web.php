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
    return redirect()->route("portal");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
//    index
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/get_article_list', 'ArticleController@getArticleList');
        Route::get('/add_article', 'ArticleController@addArticle');
        Route::get('/detail_article/{id}', 'ArticleController@detailArticle')->where('id', '[0-9]+');
        Route::get('/edit_article/{id}', 'ArticleController@editArticle')->where('id', '[0-9]+');
        Route::get('/category', 'ArticleController@categoryArticle');

        Route::get('/', 'ArticleController@index');
        Route::get('/{id}', 'ArticleController@show')->where('id', '[0-9]+');
        Route::post('/', 'ArticleController@create');
        Route::put('/{id}', 'ArticleController@update')->where('id', '[0-9]+');
        Route::delete('/{id}', 'ArticleController@destroy')->where('id', '[0-9]+');
    });
    Route::group(['prefix' => 'messages'], function () {
        Route::get('/get_message_list', 'MessageController@getMessageList');
        Route::get('/category', 'MessageController@categoryMessage');

        Route::get('/', 'MessageController@index');
        Route::get('/{id}', 'MessageController@show')->where('id', '[0-9]+');
        Route::delete('/{id}', 'MessageController@destroy')->where('id', '[0-9]+');
    });
    Route::get('/users', 'UserController@index');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index');
    });
});
Route::group(['middleware' => 'auth', 'prefix' => 'common', 'namespace' => 'Common'], function () {

        Route::get('/get_category', 'CommonController@getCategory');
        Route::post('/add_category', 'CommonController@storeCategory');
        Route::get('/getQiNiuToken', 'CommonController@getQiNiuToken');
});
Route::group(['prefix' => 'portal', 'namespace' => 'portal'], function () {
    Route::get('/', 'HomepageController@index')->name('portal');
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/list', 'ArticleController@list');
        Route::get('/info', 'ArticleController@info');
    });
    Route::group(['prefix' => 'message'], function () {
        Route::get('/list', 'MessageController@index');
    });

});
Route::group(['prefix' => 'wechat', 'namespace' => 'wechat'], function () {
    Route::get('/', 'WechatController@index');


});