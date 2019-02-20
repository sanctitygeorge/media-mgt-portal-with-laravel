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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::post('upload', 'UploadController@upload');

//Pages Route
Route::get('/posts', 'PageController@post')->name('posts');
Route::get('/videos', 'PageController@video')->name('videos');
Route::get('/audios', 'PageController@audio')->name('audios');
Route::get('/our-team', 'PageController@team')->name('our-team');
Route::get('/about-us', 'PageController@about')->name('about-us');
Route::get('/contact-us', 'PageController@contact')->name('contact-us');


Route::group(['prefix' => 'myadmin'], function(){

	Auth::routes();
        
    });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('posts/delete-all', 'PostController@truncate')->name('posts.truncate')->middleware('auth');
Route::get('videos/delete-all', 'VideoController@truncate')->name('videos.truncate')->middleware('auth');
Route::get('audios/delete-all', 'AudioController@truncate')->name('audios.truncate')->middleware('auth');
Route::get('teams/delete-all', 'TeamController@truncate')->name('teams.truncate')->middleware('auth');
Route::get('feedbacks/delete-all', 'FeedbackController@truncate')->name('feedbacks.truncate')->middleware('auth');





Route::resource('feedbacks', 'FeedbackController');


Route::group(['middleware'=>['auth'],  'prefix' => 'myadmin'], function(){

        Route::resource('posts', 'PostController');
        Route::resource('videos', 'VideoController');
        Route::resource('audios', 'AudioController');
        Route::resource('teams', 'TeamController');

        Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('password.form');
        Route::post('/change-password', 'Auth\ChangePasswordController@update')->name('password.update');
        

    });