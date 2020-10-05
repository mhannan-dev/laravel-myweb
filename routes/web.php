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


// Admin Routes
Route::group(['prefix' => 'admin'], function(){
  //Home Page Controller

  Route::get('/', 'Backend\HomeController@dashboard')->name('admin.dashboard');
  Route::get('/home-page-data-list', 'Backend\HomeController@index')->name('admin_home_page_data_list');
  Route::get('/home-page-data-add-form', 'Backend\HomeController@create')->name('admin_home_create');
  Route::post('/homepage-store', 'Backend\HomeController@store')->name('admin_home_store');
  Route::post('/homepage-delete-data/{id}', 'Backend\HomeController@delete')->name('admin_home_delete_data');

  //Home Page Controller

  //About Page Controller
    Route::get('/all', 'Backend\AboutController@index')->name('about_data_list');
    Route::get('/about-page-data-add-form', 'Backend\AboutController@create')->name('admin_about_create');
    Route::post('/store', 'Backend\AboutController@store')->name('admin_about_store');


  //About Page Controller

});
