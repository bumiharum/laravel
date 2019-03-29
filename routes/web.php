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



Route::get('/', 'PagesController@home');
Route::get('/blog', 'PagesController@blog');
Route::get('/blog/{slug}', 'PagesController@single');
Route::get('/visi-misi', 'PagesController@visimisi');
Route::get('/hubungan', 'PagesController@hubungan');
Route::get('/gtk', 'PagesController@guru');
Route::get('/sarpras/{name?}', 'PagesController@sarpras');
Route::get('/eskul/{name?}', 'PagesController@eskul');

// POSTS
Route::resource('/posts', 'PostsController');
Route::get('/posts/delete/{id}', ['as' => 'posts.delete', 'uses' => 'PostsController@destroy']);

// GALERY
Route::resource('/galery', 'GaleryController');
Route::get('/galery/delete/{id}', ['as' => 'galery.delete', 'uses' => 'GaleryController@destroy']);

// VIDEO
Route::resource('/videos', 'VideosController');
Route::get('/videos/delete/{id}', ['as' => 'videos.delete', 'uses' => 'VideosController@destroy']);

// TEACHERS
Route::resource('/teachers', 'TeachersController');
Route::get('/teachers/delete/{id}', ['as' => 'teachers.delete', 'uses' => 'TeachersController@destroy']);

// STUDIES
Route::resource('/studies', 'StudiesController')->except(['create']);
Route::get('/studies/delete/{id}', ['as' => 'studies.delete', 'uses' => 'StudiesController@destroy']);

// ADMINISTRATOR
Route::resource('/administrator', 'AdministratorController');
Route::get('/administrator/delete/{id}', ['as' => 'administrator.delete', 'uses' => 'AdministratorController@destroy']);

// ROLES
Route::resource('/roles', 'RolesController')->except(['create']);
Route::get('/roles/delete/{id}', ['as' => 'roles.delete', 'uses' => 'RolesController@destroy']);

// PICTURES
Route::resource('/pictures', 'PicturesController');
Route::get('/pictures/delete/{id}', ['as' => 'pictures.delete', 'uses' => 'PicturesController@destroy']);

// Infrastructures
Route::resource('/infrastructures', 'InfrastructuresController')->except(['create']);
Route::get('/infrastructures/delete/{id}', ['as' => 'infrastructures.delete', 'uses' => 'InfrastructuresController@destroy']);


// CATEGORIES
Route::resource('/categories', 'CategoriesController')->except(['create']);
Route::get('/categories/delete/{id}', ['as' => 'categories.delete', 'uses' => 'CategoriesController@destroy']);

// ACHIEVEMENTS
Route::resource('/achievements', 'AchievementsController');
Route::get('/achievements/delete/{id}', ['as' => 'achievements.delete', 'uses' => 'AchievementsController@destroy']);

// EXTRACURRICULAR
Route::resource('/extracurriculars', 'ExtracurricularsController')->except(['create']);
Route::get('/extracurriculars/delete/{id}', ['as' => 'extracurriculars.delete', 'uses' => 'ExtracurricularsController@destroy']);

// EXTRA
Route::resource('/extras', 'ExtrasController');
Route::get('/extras/delete/{id}', ['as' => 'extras.delete', 'uses' => 'ExtrasController@destroy']);

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
