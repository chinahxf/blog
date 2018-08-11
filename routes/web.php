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

//Route::get('/', function () {
//    return redirect()->route("portal");
//});
Route::get('index', function () {
    return redirect()->route("index");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('is_admin','auth');

Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'boss', 'namespace' => 'Admin'], function () {
//    index
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'articles'], function () {
        Route::view('/get_article_list', 'admin.articles.list');
        Route::view('/add_article', 'admin.articles.add');
        Route::get('/detail_article/{id}', function($id){
            return view('admin.articles.detail',['id'=>$id]);
        })->where('id', '[0-9]+');
        Route::get('/edit_article/{id}', function($id){
            return view('admin.articles.edit',['id'=>$id]);
        })->where('id', '[0-9]+');
        Route::view('/category', 'admin.articles.category');

        Route::get('/', 'ArticleController@index');
        Route::get('/{id}', 'ArticleController@show')->where('id', '[0-9]+');
        Route::post('/', 'ArticleController@store');
        Route::put('/{id}', 'ArticleController@update')->where('id', '[0-9]+');
        Route::delete('/{id}', 'ArticleController@destroy')->where('id', '[0-9]+');
    });
    Route::group(['prefix' => 'comments'], function () {
        Route::view('/get_comment_list', 'admin.comments.list');
        Route::view('/category', 'admin.comments.category');

        Route::get('/', 'CommentController@index');
        Route::get('/{id}', 'CommentController@show')->where('id', '[0-9]+');
        Route::delete('/{id}', 'CommentController@destroy')->where('id', '[0-9]+');
    });
    Route::group(['prefix' => 'banners'], function () {
        Route::get('/get_banner_list/{id}', function($id){
            return view('admin.banners.list',['category_id'=>$id]);
        })->where('id', '[0-9]+');
        Route::view('/category', 'admin.banners.category.list');
        Route::get('/add_banner/{category_id}', function($id){
            return view('admin.banners.add',['category_id'=>$id]);
        })->where('id', '[0-9]+');
        Route::get('/edit_banner/{id}', function ($id){
            return view('admin.banners.edit',['id'=>$id]);
        })->where('id', '[0-9]+');
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
Route::group(['namespace' => 'Portal'], function () {
    Route::get('/', 'HomepageController@index')->name('index');
    Route::group(['prefix' => 'login'], function () {
        Route::group(['prefix' => 'qq'], function () {
            Route::get('/', 'LoginController@qq');
            Route::get('/callback', 'LoginController@qqcallback');
        });

    });
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/list/{id}', 'ArticleController@list')->where('id','[0-9]+');
        Route::get('/{id}', 'ArticleController@info')->where('id','[0-9]+');
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('/list', 'CommentController@index');
        Route::post('/', 'CommentController@store')->middleware("auth_json");
    });
    Route::group(['prefix' => 'friends'], function () {
        Route::get('/create', 'FriendController@create');
        Route::post('/', 'FriendController@store');
    });
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/{id}', 'TagController@show')->where('id','[0-9]+');
    });
});
Route::group(['prefix' => 'wechat', 'namespace' => 'Wechat'], function () {
    Route::any('/', 'WechatController@index');


});