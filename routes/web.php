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
/*
/ PagesController
*/

Route::get('/', 'Frontend\PagesController@index')->name('frontend.index');
Route::get('/about', 'Frontend\PagesController@about')->name('frontend.about');
Route::get('/services', 'Frontend\PagesController@services')->name('frontend.services');
Route::get('/portfolio', 'Frontend\PagesController@portfolio')->name('frontend.portfolio');
Route::get('/blog', 'Frontend\PagesController@blog')->name('frontend.blog');
Route::get('/contact', 'Frontend\PagesController@contact')->name('frontend.contact');
Route::post('/contact_mail', 'Frontend\PagesController@contact_mail')->name('frontend.contact_mail');



// Admin Routes
Route::group(['prefix' => 'admin'], function(){
  //Home Page Controller
  Route::get('/', 'Backend\HomeController@dashboard')->name('admin.dashboard');
  Route::get('/home-page', 'Backend\HomeController@index')->name('admin.home.page');
  Route::get('/home-page-data-create', 'Backend\HomeController@create')->name('admin.home.create');
  Route::post('/home-page-data-store', 'Backend\HomeController@store')->name('admin.home.store');
  Route::get('/home-page-data-edit/{id}', 'Backend\HomeController@edit')->name('admin.home.edit');
  Route::post('/home-page-edit/{id}', 'Backend\HomeController@update')->name('admin.home.update');
  Route::post('/home-page-data-delete/{id}', 'Backend\HomeController@delete')->name('admin.home.delete');
  //Home Page Controller

  //About Page Controller
  Route::get('/about-page', 'Backend\AboutController@index')->name('admin.about.page');
  Route::get('/about-page-data-create', 'Backend\AboutController@create')->name('admin.about.create');
  Route::post('/about-page-data-store', 'Backend\AboutController@store')->name('admin.about.store');
  Route::get('/about-page-data-edit/{id}', 'Backend\AboutController@edit')->name('admin.about.edit');
  Route::post('/about-page-edit/{id}', 'Backend\AboutController@update')->name('admin.about.update');
  Route::post('/about-data-delete/{id}', 'Backend\AboutController@delete')->name('admin.about.delete');
  //About Page Controller

  //Service Page Controller
  Route::get('/service-page', 'Backend\ServicesController@index')->name('admin.service.page');
  Route::get('/service-page-data-create', 'Backend\ServicesController@create')->name('admin.service.create');
  Route::post('/service-page-data-store', 'Backend\ServicesController@store')->name('admin.service.store');
  Route::get('/service-page-data-edit/{id}', 'Backend\ServicesController@edit')->name('admin.service.edit');
  Route::post('/service-page-edit/{id}', 'Backend\ServicesController@update')->name('admin.service.update');
  Route::post('/service-data-delete/{id}', 'Backend\ServicesController@delete')->name('admin.service.delete');
  //Service Page Controller

  //Contact Page Controller
  Route::get('/unseen-msg-page', 'Backend\ContactController@index')->name('admin.message.page');
  Route::get('/seen-msg-page', 'Backend\ContactController@seenIndex')->name('admin.message.seen');
  Route::get('/edit/{id}', 'Backend\ContactController@edit')->name('admin.message.view');
  Route::post('/edit/{id}', 'Backend\ContactController@update')->name('admin.message.updateView');
  Route::post('/message-data-delete/{id}', 'Backend\ContactController@delete')->name('admin.message.delete');
  //Contact Page Controller


    //Blog Page Controller
    Route::get('/blogs', 'Backend\BlogsController@index')->name('admin.blog.list');
    Route::get('blog/create', 'Backend\BlogsController@create')->name('admin.blog.create');
    Route::post('blog/store', 'Backend\BlogsController@store')->name('admin.blog.store');
    Route::get('blog/edit/{id}', 'Backend\BlogsController@edit')->name('admin.blog.edit');
    Route::post('blog/edit/{id}', 'Backend\BlogsController@update')->name('admin.blog.update');
    Route::post('blog/delete/{id}', 'Backend\BlogsController@delete')->name('admin.blog.delete');
    //Blog Page Controller



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
