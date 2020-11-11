<?php
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
/*
/ PagesController
*/

Route::get('/', 'Frontend\PagesController@index')->name('frontend.index');
Route::get('/about', 'Frontend\PagesController@about')->name('frontend.about');
Route::get('/services', 'Frontend\PagesController@services')->name('frontend.services');
Route::get('/portfolio', 'Frontend\PagesController@portfolio')->name('frontend.portfolio');
Route::get('/blog', 'Frontend\PagesController@blog')->name('frontend.blog');
Route::get('/blog/{slug}','Frontend\PagesController@blog_details')->name('frontend.blog.details');
Route::get('/contact', 'Frontend\PagesController@contact')->name('frontend.contact');
Route::post('/contact_mail', 'Frontend\PagesController@contact_mail')->name('frontend.contact_mail');
Route::get('/category/{slug}','Frontend\PagesController@postByCategory')->name('category_wise.post');




// Admin Routes
Route::group(['prefix' => 'admin'], function(){

  Route::get('/', 'Backend\DashboardController@dashboard')->name('admin.dashboard');
  Route::get('/home', 'Backend\DashboardController@index')->name('admin.home.page');
  Route::get('/home-create', 'Backend\DashboardController@create')->name('admin.home.create');
  Route::post('/home-store', 'Backend\DashboardController@store')->name('admin.home.store');
  Route::get('/home-edit/{id}', 'Backend\DashboardController@edit')->name('admin.home.edit');
  Route::post('/home-update/{id}', 'Backend\DashboardController@update')->name('admin.home.update');
  Route::post('/home-delete/{id}', 'Backend\DashboardController@delete')->name('admin.home.delete');

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
    Route::get('/allpost', 'Backend\BlogsController@index')->name('admin.blog.list');
    Route::get('blog/create', 'Backend\BlogsController@create')->name('admin.blog.create');
    Route::post('blog/store', 'Backend\BlogsController@store')->name('admin.blog.store');
    Route::get('blog/edit/{id}', 'Backend\BlogsController@edit')->name('admin.blog.edit');
    Route::post('blog/edit/{id}', 'Backend\BlogsController@update')->name('admin.blog.update');
    Route::post('blog/delete/{id}', 'Backend\BlogsController@delete')->name('admin.blog.delete');
    //Blog Page Controller

    //CategoryTrait Controller -resource
    Route::resource('category','Backend\CategoryController');
    Route::post('category-update','Backend\CategoryController@update');


    //Blog Page Portfolio
    Route::get('/all_portfolio', 'Backend\PortfolioController@index')->name('admin.portfolio.list');
    Route::get('portfolio/create', 'Backend\PortfolioController@create')->name('admin.portfolio.create');
    Route::post('portfolio/store', 'Backend\PortfolioController@store')->name('admin.portfolio.store');
    Route::get('portfolio/edit/{id}', 'Backend\PortfolioController@edit')->name('admin.portfolio.edit');
    Route::post('portfolio/edit/{id}', 'Backend\PortfolioController@update')->name('admin.portfolio.update');
    Route::post('portfolio/delete/{id}', 'Backend\PortfolioController@delete')->name('admin.portfolio.delete');
    //Blog Page Portfolio


    //Tag Controller -resource
    Route::resource('tag','Backend\TagController');
    Route::post('tag-update','Backend\TagController@update');

    //Blog Page Controller
    Route::get('/all-post', 'Backend\BlogsController@index')->name('admin.blog.list');
    Route::get('blog/create', 'Backend\BlogsController@create')->name('admin.blog.create');
    Route::post('blog/store', 'Backend\BlogsController@store')->name('admin.blog.store');
    Route::get('blog/edit/{id}', 'Backend\BlogsController@edit')->name('admin.blog.edit');
    Route::post('blog/edit/{id}', 'Backend\BlogsController@update')->name('admin.blog.update');
    Route::post('blog/delete/{id}', 'Backend\BlogsController@delete')->name('admin.blog.delete');
    //Blog Page Controller


});


//to clear all cache
Route::get('__clear',function(){
    try{
        // \Artisan::call('optimize');
        \Artisan::call('optimize:clear');
    }
    catch(\Exception $e){
        echo $e->getMessage();
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user'], function() {
    Route::get('/all-user', 'Backend\UsersController@getIndex')->name('user.list');
    Route::get('/create', 'Backend\UsersController@getCreate')->name('user.create');
    Route::post('/store', 'Backend\UsersController@postStore')->name('user.store');
    Route::get('/edit/{id}', 'Backend\UsersController@getEdit')->name('user.edit');
    Route::post('/update/{id}', 'Backend\UsersController@postUpdate')->name('user.update');
    Route::post('/delete/{id}', 'Backend\UsersController@postDelete')->name('user.delete');
});

Route::group(['prefix' => 'profile'], function() {
    Route::get('/view', 'Backend\ProfileController@getIndex')->name('user.profile.view');
    Route::get('/edit/{id}', 'Backend\ProfileController@getEdit')->name('user.profile.edit');
    Route::post('/update/{id}', 'Backend\ProfileController@postUpdate')->name('user.profile.update');
    Route::get('/password/view', 'Backend\ProfileController@getPasswordView')->name('user.profile.password_view');
    Route::post('/password/update', 'Backend\ProfileController@postPasswordUpdate')->name('user.profile.password_update');
});


Route::group(['prefix' => 'settings'], function() {
    Route::get('/view', 'Backend\SettingsController@getIndex')->name('admin.view.settings');
    Route::post('/new', 'Backend\SettingsController@postStore')->name('admin.store.settings');
    Route::get('/edit-logo/{id}', 'Backend\SettingsController@getEdit')->name('admin.edit.logo');
    Route::post('/update-logo/{id}', 'Backend\SettingsController@postUpdate')->name('admin.update.logo');
    Route::post('/delete/{id}', 'Backend\SettingsController@postDelete')->name('admin.delete.settings');
});
