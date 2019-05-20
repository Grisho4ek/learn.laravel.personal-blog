<?php
// урок 66
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

Route::get('/', 'PublicController@index')->name('index');

Route::get('post/{post}', 'PublicController@singlePost')->name('singlePost');

Route::get('about', 'PublicController@about')->name('about');

Route::get('contact', 'PublicController@contact')->name('contact');

Route::post('contact', 'PublicController@contactPost')->name('contactPost');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('user')->group(function(){
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
        Route::post('comments/{id}/delete', 'UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'UserController@profilePost')->name('userProfilePost');
    Route::post('newComment', 'UserController@newComment')->name('newComment');
});

Route::prefix('author')->group(function(){
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('posts/new', 'AuthorController@newPost')->name('authorNewPost');
        Route::post('posts/new', 'AuthorController@createNewPost')->name('createNewPost');
        Route::get('posts/{id}/edit', 'AuthorController@editPost')->name('editPost');
        Route::post('posts/{id}/edit', 'AuthorController@postEditPost')->name('postEditPost');
        Route::post('posts/{id}/delete', 'AuthorController@deletePost')->name('deletePost');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
});

Route::prefix('admin')->group(function(){
    Route::get('dashboard','AdminController@dashboard')->name('adminDashboard');
    Route::get('comments','AdminController@comments')->name('adminComments');
    Route::get('users','AdminController@users')->name('adminUsers');
        Route::get('users/{id}/edit', 'AdminController@editUser')->name('adminEditUser');
        Route::post('users/{id}/edit', 'AdminController@postEditUser')->name('adminPostEditUser');
        Route::post('users/{id}/delete', 'AdminController@deleteUser')->name('adminDeleteUser');
    Route::get('posts','AdminController@posts')->name('adminPosts');
        Route::get('posts/{id}/edit', 'AdminController@editPost')->name('adminEditPost');
        Route::post('posts/{id}/edit', 'AdminController@postEditPost')->name('adminPostEditPost');
        Route::post('posts/{id}/delete', 'AdminController@deletePost')->name('adminDeletePost');
    Route::get('comments', 'AdminController@comments')->name('adminComments');
        Route::post('comments/{id}/delete', 'AdminController@adminDeleteComment')->name('adminDeleteComment');
});
