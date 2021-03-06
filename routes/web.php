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
/*
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.update');
*/



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/account/setting', 'Auth\UserController@setting')->name('setting');
Route::get('/account/modify/user', 'Auth\UserController@modifyUser')->name('modify.user');
Route::post('/account/modify/user', 'Auth\UserController@modifyUserData')->name('modify.user.data');
Route::get('/account/modify/user/pwd', 'Auth\UserController@modifyUserPwd')->name('modify.user.pwd');
Route::post('/account/modify/user/pwd', 'Auth\UserController@modifyUserPwdData')->name('modify.user.pwd.data');
Route::get('/account/delete/user', 'Auth\UserController@deleteUser')->name('delete.user');
Route::post('/account/delete/user', 'Auth\UserController@deleteUserData')->name('delete.user.data');

//bookadd

Route::get('/book/add', 'bookController@addBook')->name('add.Book');
Route::post('/book/add', 'bookController@addBookData')->name('add.Book.data');
Route::post('/book/search', 'bookController@searchBook')->name('search.Book');

//Commodity
Route::post('/account/good', 'Auth\GoodController@management')->name('good.management');
Route::post('/account/good/edit','Auth\GoodController@editGood')->name('edit.good');
Route::post('/account/good/success','Auth\GoodController@editGoodData')->name('edit.good.data');
Route::post('/account/good/delete', 'Auth\GoodController@deleteGood')->name('delete.good');

//shop-cart
Route::get('/good/shoppingcart', 'Auth\GoodController@getCart')->name("shoppingcart.index");
Route::get('/good/shoppingcart/add/{id}', 'Auth\GoodController@getAddToCart')->name("shoppingcart.add");
Route::get('/good/shoppingcart/remove/{id}', 'Auth\GoodController@getReductByOne')->name("shoppingcart.reduce");
Route::get('/good/shoppingcart/reduce/{id}', 'Auth\GoodController@getRemoveItem')->name("shoppingcart.remove");