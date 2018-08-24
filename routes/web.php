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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'PageController@index')->name('home');
Route::get('/shop', 'PageController@shop')->name('shop');
Route::get('category/{slug}', 'PageController@category');
Route::get('product/{slug}', 'PageController@detailProduct');

//cart
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart', 'CartController@store');
Route::delete('cart/{cart}', 'CartController@destroy');
Route::patch('cart/update', 'CartController@update');

//checkout
Route::get('checkout', 'CheckoutController@newCheckout')->name('checkout.new');
Route::get('checkout/address', 'CheckoutController@addressForm')->name('checkout.address');
Route::post('checkout/address', 'CheckoutController@address');
Route::get('checkout/shipping', 'CheckoutController@shippingForm')->name('checkout.shipping');
Route::post('checkout/shipping', 'CheckoutController@shipping');
Route::get('checkout/payment', 'CheckoutController@paymentForm')->name('checkout.payment');
Route::post('checkout/payment', 'CheckoutController@payment');
Route::get('checkout/review', 'CheckoutController@review')->name('checkout.review');

//order
Route::post('order', 'OrderController@store');

//member page
Route::prefix('member')->group(function(){
	Route::get('account', 'MemberController@account')->name('member.account');
	Route::patch('account', 'MemberController@updateAccount');
	Route::patch('change-password', 'MemberController@changePassword');

	//order
	Route::get('order', 'OrderController@index')->name('member.order.index');
	Route::get('order/{order}', 'OrderController@show')->name('member.order.show');
	Route::patch('order/{order}/set-delivered', 'OrderController@setDelivered');

	//payment confirmation
	Route::get('payment-confirmation/{order}', 'PaymentConfirmationController@create');
	Route::post('payment-confirmation/{order}', 'PaymentConfirmationController@store');

	//wishlist
	Route::get('wishlist', 'WishlistController@index');
	Route::post('wishlist', 'WishlistController@store');
	Route::delete('wishlist/{wishlist}', 'WishlistController@destroy');
});

Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.index');

	//akun
	Route::get('account', 'AdminController@account')->name('admin.account');
	Route::patch('account', 'AdminController@updateAccount');
	Route::patch('change-password', 'AdminController@changePassword');

	//setting web
	Route::get('setting', 'SettingController@index')->name('admin.setting');
	Route::patch('update-company', 'SettingController@updateCompany');

	//category
	Route::get('category', 'CategoryController@index')->name('admin.category.index');
	Route::post('category', 'CategoryController@store')->name('admin.category.store');
	Route::delete('category/{category}', 'CategoryController@destroy');

	//product
	Route::get('product', 'ProductController@index')->name('admin.product.index');
	Route::get('product/create', 'ProductController@create')->name('admin.product.create');
	Route::post('product', 'ProductController@store')->name('admin.product.store');
	Route::get('product/{slug}', 'ProductController@show')->name('admin.product.show');
	Route::patch('product/{product}', 'ProductController@update');
	Route::delete('product/{product}', 'ProductController@destroy');
	Route::patch('product/{product}/add-stock', 'ProductController@addStock');

	//order
	Route::get('order', 'OrderController@index')->name('admin.order.index');
	Route::get('order/{order}', 'OrderController@show')->name('admin.order.show');
	Route::patch('order/{order}/process', 'OrderController@process');
	Route::patch('order/{order}/send', 'OrderController@send');
});
