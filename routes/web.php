<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Front End Routes
Route::get('/', 'FrontEndController@home')->name('website');
Route::get('/about', 'FrontEndController@about')->name('website.about');
Route::get('/category/{slug}', 'FrontEndController@category')->name('website.category');
Route::get('/contact', 'FrontEndController@contact')->name('website.contact');
Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');



// Admin Panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/dashboard', function() {
        return view('admin.dashboard.index');
    });

    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');

    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profileUpdate')->name('user.profile.update');

    // Settings route
    Route::get('setting', 'SettingController@edit')->name('setting.edit');
    Route::post('setting', 'SettingController@update')->name('setting.update');
});
