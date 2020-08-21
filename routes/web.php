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

Route::get('/', 'CerveController@homepage');

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
    Route::resource('/admin/homepage/product-category','ProductCategoryController');
    Route::get('live',['as'=>'live', 'uses'=>'ProductAdminController@live']);
    Route::get('active',['as'=>'active', 'uses'=>'ProductAdminController@active']);
    Route::get('sold',['as'=>'sold', 'uses'=>'ProductAdminController@sold']);
    Route::get('costing/{id}',['as'=>'costing', 'uses'=>'ProductAdminController@costing']);
    Route::post('costing',['as'=>'costing.store', 'uses'=>'ProductAdminController@costStore']);
    Route::delete('costing/{id}',['as'=>'costing.delete', 'uses'=>'ProductAdminController@costDelete']);
    Route::get('costing_update/{id}',['as'=>'costing-update', 'uses'=>'ProductAdminController@costUpdate']);
    Route::patch('costing_update/{id}',['as'=>'costing-updated', 'uses'=>'ProductAdminController@costUpdated']);
    Route::resource('/admin/homepage/pricing','PricingController');

});

Route::group([], function (){
    Route::get('about-us',['as'=>'about-us', 'uses'=>'CerveController@about']);
    Route::get('blog',['as'=>'blog', 'uses'=>'CerveController@blog']);
    Route::get('post/{slug}',['as'=>'post', 'uses'=>'CerveController@post']);
    Route::get('work-with-us',['as'=>'work', 'uses'=>'CerveController@work']);
    Route::get('/faqs',['as'=>'faqs', 'uses'=>'CerveController@faqs']);
    Route::get('/faqs/show/{id}',['as'=>'questions', 'uses'=>'CerveController@questions']);
    Route::get('privacy-policy',['as'=>'policy', 'uses'=>'CerveController@policy']);
    Route::get('terms-and-conditions',['as'=>'terms', 'uses'=>'CerveController@terms']);
    Route::get('/portfolio',['as'=>'portfolio', 'uses'=>'CerveController@portfolio']);
    Route::get('/portfolio/show/{id}',['as'=>'previousWork', 'uses'=>'CerveController@previousWork']);
    Route::resource('brand-shop', 'BrandShopController');
    Route::resource('cart', 'CartController');
    Route::get('brand-shop/category/{slug}',['as'=>'category', 'uses'=>'BrandShopController@category']);



});

Route::group([], function(){
    Route::resource('account', 'AccountController');
    Route::resource('account/homepage/profile', 'ProfileController');
    Route::resource('account/homepage/career', 'CareerController');
    Route::resource('account/homepage/career', 'CareerController');
    Route::resource('account/homepage/wishlist', 'UserWishlistController');
    Route::resource('account/homepage/review', 'ReviewController');
    Route::resource('contact-us', 'ContactController');
    Route::resource('branding', 'BrandingController');
});
