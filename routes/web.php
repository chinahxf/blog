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

Route::get('/home', 'HomeController@index')->name('home')->middleware('is_admin','auth');

Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
//    index
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'articles'], function () {
        Route::get('/get_article_list', 'ArticleController@getArticleList');
        Route::get('/add_article', 'ArticleController@createArticle');
        Route::get('/detail_article/{id}', 'ArticleController@detailArticle')->where('id', '[0-9]+');
        Route::get('/edit_article/{id}', 'ArticleController@editArticle')->where('id', '[0-9]+');
        Route::get('/category', 'ArticleController@categoryArticle');

        Route::get('/', 'ArticleController@index');
        Route::get('/{id}', 'ArticleController@show')->where('id', '[0-9]+');
        Route::post('/', 'ArticleController@store');
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
    Route::group(['prefix' => 'banners'], function () {
        Route::get('/get_banner_list/{id}', 'BannerController@getBannerList')->where('id', '[0-9]+');
        Route::get('/category', 'BannerController@categoryBanner');
        Route::get('/add_banner/{category_id}', 'BannerController@createBanner')->where('id', '[0-9]+');
        Route::get('/edit_banner/{id}', 'BannerController@editBanner')->where('id', '[0-9]+');
//        Route::get('/detail_article/{id}', 'ArticleController@detailArticle')->where('id', '[0-9]+');
//        Route::get('/edit_article/{id}', 'ArticleController@editArticle')->where('id', '[0-9]+');
//        Route::get('/category', 'ArticleController@categoryArticle');
//
        Route::get('/list{id}', 'BannerController@index')->where('id', '[0-9]+');
        Route::get('/{id}', 'BannerController@show')->where('id', '[0-9]+');
        Route::post('/', 'BannerController@store');
        Route::put('/{id}', 'BannerController@update')->where('id', '[0-9]+');
//        Route::delete('/{id}', 'ArticleController@destroy')->where('id', '[0-9]+');
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
Route::group(['prefix' => 'portal', 'namespace' => 'Portal'], function () {
    Route::get('/', 'HomepageController@index')->name('portal');
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/list', 'ArticleController@list');
        Route::get('/info', 'ArticleController@info');
    });
    Route::group(['prefix' => 'message'], function () {
        Route::get('/list', 'MessageController@index');
        Route::post('/', 'MessageController@store')->middleware("auth_json");
    });
    Route::group(['prefix' => 'friends'], function () {
        Route::get('/create', 'FriendController@create');
        Route::post('/', 'FriendController@store');
    });

});
Route::group(['prefix' => 'wechat', 'namespace' => 'Wechat'], function () {
    Route::any('/', 'WechatController@index');


});