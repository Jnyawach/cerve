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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([], function(){

    Route::resource('/admin','AdminController');
    Route::resource('admin/homepage/users','UserAdminController');
    Route::resource('/admin/homepage/products','ProductAdminController');
    Route::resource('/admin/homepage/blog','BlogAdminController');
    Route::resource('/admin/homepage/portfolio','PortfolioAdminController');
    Route::resource('/admin/homepage/jobs','JobAdminController');
    Route::resource('/admin/homepage/policy','PolicyAdminController');
    Route::resource('/admin/homepage/faqs','FaqAdminController');
    Route::get('live',['as'=>'live', 'uses'=>'ProductAdminController@live']);
    Route::get('active',['as'=>'active', 'uses'=>'ProductAdminController@active']);
    Route::get('sold',['as'=>'sold', 'uses'=>'ProductAdminController@sold']);


});
