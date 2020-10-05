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

Route::group(['middleware'=>'role'], function(){

    Route::resource('/admin','AdminController');
    Route::resource('admin/homepage/users','UserAdminController');
    Route::resource('/admin/homepage/products','ProductAdminController');
    Route::resource('/admin/homepage/blog','BlogAdminController');
    Route::resource('/admin/homepage/portfolio','PortfolioAdminController');
    Route::resource('/admin/homepage/jobs','JobAdminController');
    Route::resource('/admin/homepage/policy','PolicyAdminController');
    Route::resource('/admin/homepage/faqs','FaqAdminController');
    Route::resource('/admin/homepage/orders','OrdersAdminController');
    Route::get('admin/orders/pending',['as'=>'pending.order', 'uses'=>'OrdersAdminController@pending']);
    Route::get('admin/orders/processing',['as'=>'process.order', 'uses'=>'OrdersAdminController@process']);
    Route::get('admin/orders/complete',['as'=>'complete.order', 'uses'=>'OrdersAdminController@complete']);
    Route::get('admin/orders/cancelled',['as'=>'cancel.order', 'uses'=>'OrdersAdminController@cancel']);
    Route::get('admin/homepage/printing/active',['as'=>'active.print', 'uses'=>'AdminPrintOnDemandController@active']);
    Route::get('admin/homepage/printing/processing',['as'=>'process.print', 'uses'=>'AdminPrintOnDemandController@processing']);
    Route::get('admin/homepage/printing/complete',['as'=>'complete.print', 'uses'=>'AdminPrintOnDemandController@complete']);
    Route::get('admin/homepage/printing/cancel',['as'=>'cancel.print', 'uses'=>'AdminPrintOnDemandController@cancel']);
    Route::resource('/admin/homepage/printing','AdminPrintOnDemandController');
    Route::resource('/admin/homepage/product-category','ProductCategoryController');
    Route::resource('/admin/homepage/shipping','ShippingAdminController');
    Route::get('live',['as'=>'live', 'uses'=>'ProductAdminController@live']);
    Route::get('active',['as'=>'active', 'uses'=>'ProductAdminController@active']);
    Route::get('sold',['as'=>'sold', 'uses'=>'ProductAdminController@sold']);
    Route::get('costing/{id}',['as'=>'costing', 'uses'=>'ProductAdminController@costing']);
    Route::post('costing',['as'=>'costing.store', 'uses'=>'ProductAdminController@costStore']);
    Route::delete('costing/{id}',['as'=>'costing.delete', 'uses'=>'ProductAdminController@costDelete']);
    Route::get('costing_update/{id}',['as'=>'costing-update', 'uses'=>'ProductAdminController@costUpdate']);
    Route::patch('costing_update/{id}',['as'=>'costing-updated', 'uses'=>'ProductAdminController@costUpdated']);
    Route::resource('/admin/homepage/pricing','PricingController');
    Route::resource('/admin/homepage/mpesa', 'MpesaC2BController');
    Route::resource('admin/homepage/applicant', 'AdminJobApplicationController');


});

Route::group([], function (){
    Route::get('about-us',['as'=>'about-us', 'uses'=>'CerveController@about']);
    Route::get('blog',['as'=>'blog', 'uses'=>'CerveController@blog']);
    Route::get('post/{slug}',['as'=>'post', 'uses'=>'CerveController@post']);
    Route::resource('faqs-panel','FaqsPanelController');

    Route::get('privacy-policy',['as'=>'policy', 'uses'=>'CerveController@policy']);
    Route::get('terms-and-conditions',['as'=>'terms', 'uses'=>'CerveController@terms']);
    Route::get('/portfolio',['as'=>'portfolio', 'uses'=>'CerveController@portfolio']);
    Route::get('/portfolio/show/{id}',['as'=>'previousWork', 'uses'=>'CerveController@previousWork']);
    Route::resource('brand-shop', 'BrandShopController');
    Route::resource('work-with-us', 'WorkWithUsController');
    Route::get('brand-shop/category/{slug}',['as'=>'category', 'uses'=>'BrandShopController@category']);
    Route::resource('contact-us', 'ContactController');




});

Route::group(['middleware'=>'auth'], function(){
    Route::resource('cart', 'CartController');
    Route::get('cart/homepage/checkout', ['as'=>'checkout','uses'=>'CartController@checkout']);
    Route::resource('account', 'AccountController');
    Route::resource('account/homepage/profile', 'ProfileController');
    Route::get('/application/{id}', ['as'=>'application','uses'=>'CareerController@application']);
    Route::resource('account/homepage/career', 'CareerController');
    Route::resource('account/homepage/career', 'CareerController');
    Route::resource('account/homepage/wishlist', 'UserWishlistController');
    Route::resource('account/homepage/review', 'ReviewController');
    Route::resource('account/homepage/payment', 'PaymentController');
    Route::resource('branding', 'BrandingController');
    Route::resource('print-on-demand', 'PrintOnDemandController');
    Route::resource('account/checkout', 'CheckoutController');
    Route::get('account/checkout/transfer', ['as'=>'bank-transfer','uses'=>'CheckoutController@transfer']);
    Route::resource('account/homepage/customer', 'UserOrdersController');
    Route::resource('account/homepage/project', 'UserPrintOnDemandController');

});

Route::resource('mail', 'MailViewController');
Route::get('mail/contact',['as'=>'contact-mail', 'uses'=>'MailViewController@contact']);
