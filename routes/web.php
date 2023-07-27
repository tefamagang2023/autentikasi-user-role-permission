<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');


        /** * User Routes
         */
        Route::middleware('auth', 'permission:Manage Users')->group(function () {
            Route::get('/users', 'UsersController@index')->name('users.index');
            Route::get('/create/user', 'UsersController@create')->name('do.users.create');
            Route::post('/create/user', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        //route roles
        Route::middleware('auth', 'permission:Manage Roles')->group(function () {
            Route::get('/roles', 'RolesController@index')->name('roles.index');
            Route::get('/create/roles', 'RolesController@create')->name('roles.create');
            Route::post('/create/roles', 'RolesController@store')->name('roles.store');
            Route::get('/{role}/show', 'RolesController@show')->name('roles.show');
            Route::get('/{role}/edit', 'RolesController@edit')->name('roles.edit');
            Route::patch('/{role}/update', 'RolesController@update')->name('roles.update');
            Route::delete('/{role}/delete', 'RolesController@destroy')->name('roles.destroy');
        });

        Route::group(['prefix' => 'permissions'], function () {
            Route::get('/', 'PermissionsController@index')->name('permissions.index');
        });

        /**
         * Posts Routes
         */

        Route::middleware('auth', 'permission:read posts')->group(function () {
            Route::get('/posts', 'PostsController@index')->name('posts.index');
        });
        Route::middleware('auth', 'permission:add posts')->group(function () {
            Route::get('/create/posts', 'PostsController@create')->name('posts.create');
            Route::post('/create/posts', 'PostsController@store')->name('posts.store');
        });
        Route::middleware('auth', 'permission:show posts')->group(function () {
            Route::get('/posts/{post}/show', 'PostsController@show')->name('posts.show');
        });
        Route::middleware('auth', 'permission:edit posts')->group(function () {
            Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/posts/{post}/update', 'PostsController@update')->name('posts.update');
        });
        Route::middleware('auth', 'permission:delete posts')->group(function () {
            Route::delete('/posts/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });


        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});
