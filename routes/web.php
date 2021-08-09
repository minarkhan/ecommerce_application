<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/', function () {
    $posts = Post::all();
    return view('welcome', compact('posts'));
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/dashboard', 'HomeController@dashboard')->name('user.dashboard');
Route::get('/post/edit/{id}', 'HomeController@post_edit')->name('user.post_edit');
Route::post('/post/update/{id}', 'HomeController@post_update')->name('user.post.update');

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');


    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::get('/posts', 'Admin\PostController@index')->name('admin.posts.index');
        Route::get('/posts/create', 'Admin\PostController@create')->name('admin.posts.create');
        Route::post('/posts/store', 'Admin\PostController@store')->name('admin.posts.store');
        Route::get('/post/edit/{id}', 'Admin\PostController@edit')->name('admin.post_edit');Route::post('/post/update/{id}', 'Admin\PostController@update')->name('admin.post.update');

        Route::get('/users', 'Admin\UserController@index')->name('admin.users.index');
        Route::get('/user/create', 'Admin\UserController@create')->name('admin.users.create');
        Route::post('/user/store', 'Admin\UserController@store')->name('admin.users.store');

    });


});
