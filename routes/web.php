<?php

use App\User;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PagesController@index')->name('main');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/register','PagesController@register');
Route::get('/contact-us','PagesController@contact');
Route::get('/projects','ForumController@index');
Route::resource('posts', 'PostsController');
Route::get('/gallery', 'GalleryController@view');
Route::get('/account', 'ProfileController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/settings', 'SettingsController@index')->name('settings');

Route::resource('users', 'UserController');
Route::get('/home/users', 'UserController@index');
Route::get('/home/users/{id}/edit', 'UserController@edit');

Route::resource('profile', 'ProfileController');

Route::resource('/home/projects', 'ProjectsController');
Route::post('/home/projects', 'ProjectsController@saveobj');
Route::post('/home/projects/create', 'ProjectsController@store');
Route::get('/home/projects/{id}/trainings', 'ProjectsController@getTrainings');
Route::get('/home/projects/{id}/trainings/create', 'ProjectsController@createTraining');
Route::get('/home/projects/{id}/objectives', 'ProjectsController@viewdetails')->name('objectives');

Route::resource('trainings', 'TrainingsController');

Route::get('/home/projects/{id}/trainings/{tid}/trainees', 'ProjectsController@getTrainees')->name('trainings');
Route::resource('/resource/evaluation', 'ResourceEvaluationController');
Route::resource('/training/evaluation', 'TrainingsEvaluationController');

Route::resource('attendees', 'AttendeesController');
Route::resource('/attendees/add', 'AttendeesCreateController');
Route::resource('report', 'ReportController');

Route::get('/home/gallery','GalleryController@index');
Route::post('/home/gallery/store', 'GalleryController@store');
Route::get('/home/gallery/{id}/photos', 'GalleryController@show')->name('photos');
Route::post('/home/gallery', 'GalleryController@savephoto');

Route::get('/home/about', 'AboutController@index');
Route::post('/home/about', 'AboutController@store');

Route::get('/home/summary','SummaryController@index');