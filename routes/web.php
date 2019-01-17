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
Route::post('/participate/{id}','ForumController@addparticipate')->name('participate');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@trainings')->name('search-index');
Route::post('/services-search','PagesController@trainingssearch')->name('search-training');
// Route::get('/services-result','PagesController@trainingssearched');


Route::get('/register','PagesController@register');
Route::get('/contact-us','PagesController@contact');
Route::get('/account-profile','PagesController@accountprofile');
Route::get('/account-requests','PagesController@accountrequest');
Route::get('/account-messages','PagesController@accountmessages');
Route::get('/account-activities','PagesController@accountactivities');

Route::get('/projects','ForumController@index');
Route::post('/projects/add-comment','ForumController@addcomment')->name('addcomment');
Route::get('/projects/trainings/{id}','ForumController@show');
Route::post('/replytocom/{id}','ForumController@replytocom')->name('reply-comment');

Route::post('/projects/trainings', 'RequestTrainingsController@request')->name('request');

Route::resource('posts', 'PostsController');
Route::get('/gallery', 'GalleryController@view');
Route::get('/gallery/{id}/view', 'GalleryController@viewGallery');

// Route::get('/account', 'ProfileController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/messages','MessageController@messages');
Route::post('/home/messages/{id}/message','MessageController@getreplies');
Route::post('/home/messages/reply','MessageController@reply');

Route::get('/home/settings', 'SettingsController@index')->name('settings');
Route::post('/home/settings/updated','HomeController@changepassword');

Route::resource('users', 'UserController');
Route::get('/home/users', 'UserController@index');
Route::get('/home/users/{id}/edit', 'UserController@edit');
Route::delete('/home/users/delete','HomeController@delete')->name('delete');
Route::post('/home/users/{id}/approved','UserController@confirmation')->name('confirm');

Route::resource('profile', 'ProfileController');

Route::resource('/home/projects', 'ProjectsController');
Route::post('/home/projects/{id}/complete','ProjectsController@completedproj');
Route::post('/home/projects', 'ProjectsController@saveobj');
Route::post('/home/projects/create', 'ProjectsController@store');
Route::get('/home/projects/{id}/trainings', 'ProjectsController@getTrainings');
Route::get('/home/projects/{id}/trainings/create', 'ProjectsController@createTraining');
Route::get('/home/projects/{id}/objectives', 'ProjectsController@viewdetails')->name('objectives');
Route::post('/home/projects/{id}/update','ProjectsController@update');
Route::get('/home/projects/trainings/{tid}/edit', 'ProjectsController@edittraining');
Route::get('/home/projects/trainings/{tid}/addresource', 'ProjectsController@getResource');
Route::get('/home/projects/{tid}/status', 'ProjectsController@getstatus');
Route::post('/home/projects/{id}/statusupdate', 'ProjectsController@updatestatus')->name('update-status');
Route::get('/home/projects/trainings/{tid}/status', 'ProjectsController@getTrainingStatus');
Route::post('/home/projects/trainings/{tid}/statusupdate', 'ProjectsController@updateTrainingStatus')->name('status-update');

Route::resource('trainings', 'TrainingsController');
Route::post('/home/projects/trainings/{id}/edit', 'TrainingsController@update');
Route::post('/home/projects/trainings/{id}/addresource', 'TrainingsController@addTopics');

Route::get('/home/projects/{id}/trainings/{tid}/trainees', 'ProjectsController@getTrainees')->name('trainings');
Route::resource('/resource/evaluation', 'ResourceEvaluationController');

Route::resource('/training/evaluation', 'TrainingsEvaluationController');
Route::get('/gettrainings/{id}','TrainingsEvaluationController@getTrainings');
Route::get('/getevaluator/{id}','TrainingsEvaluationController@getEvaluator');
Route::get('/getResource/{id}','TrainingsEvaluationController@getResource');
Route::get('/getTopic/{id}','TrainingsEvaluationController@getTopic');
// Route::get('/getdata','TrainingsEvaluationController@getData');

Route::resource('attendees', 'AttendeesController');
// Route::resource('/attendees/add', 'AttendeesCreateController');


Route::get('/home/gallery','GalleryController@index');
Route::post('/home/gallery/store', 'GalleryController@store');
Route::get('/home/gallery/{id}/photos', 'GalleryController@show')->name('photos');
Route::post('/home/gallery', 'GalleryController@savephoto');
Route::post('/home/gallery/{id}/photos/delete', 'GalleryController@remove')->name('delete-gal');

Route::get('/home/about', 'AboutController@index');
Route::post('/home/about', 'AboutController@store');

Route::get('/home/summary/training','SummaryController@index')->name('indextraining');
Route::post('/home/summary/training','SummaryController@searchproj')->name('searchproj');
Route::post('/home/summary/training/result','SummaryController@getData');
Route::post('/home/summary/resource/result','SummaryController@getResults');

Route::get('/home/summary/resource','SummaryController@indexresource');

Route::post('/contact-us/send', 'MessageController@send');

Route::get('/home/requests','RequestTrainingsController@showrequest');
Route::get('/home/requests/{id}/view','RequestTrainingsController@showrequested');
Route::post('/home/request/update','RequestTrainingsController@updateStatus');
Route::post('/home/request/updatedate','RequestTrainingsController@setDate');

// Route::get('generate',array('as'=>'generate','uses'=>'ReportController@generate'));
Route::get('/report', 'ReportController@index');
Route::post('/report/search','ReportController@search');

Route::get('/home/announcements','MessageController@announcements');
Route::post('/home/announcements/add','MessageController@announcementsadd')->name('ann-add');
Route::post('/home/announcements/{id}/delete','MessageController@announcementsdelete')->name('ann-delete');

Route::get('/home/projects/{id}/activities','ForumController@activities')->name('activities');
Route::get('/home/projects/{id}/activities/{aid}/edit','ForumController@activityedit')->name('act_edit');
Route::post('/home/projects/{id}/activities/add','ForumController@activitiesadd')->name('add_act');
Route::post('/home/projects/{id}/activities/update','ForumController@activitiesupdate')->name('update_act');
Route::post('/home/projects/{id}/activities/delete','ForumController@activitiesdelete')->name('delete_act');