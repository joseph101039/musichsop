<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/', function () {
    return view('welcome');
});
 */
Route::resource('album', 'AlbumController');
Route::resource('cart', 'CartController');
Route::get('/cart/{album_id}/{number}', 'CartController@update');
Route::get('/addToCart/{album_id}', 'CartController@store');
Route::get('/deleFromCart/{album_id}', 'CartController@destroy');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
Route::get('/', 'AlbumController@home');    //## workaround ##

//Auth::routes();
# orignial route for Auth::routes();
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

# change post login route
Route::post('/login', 'Auth\LoginController@userLogin');

Route::get('/home', 'AlbumController@home');
Route::get('/browse', 'AlbumController@show');
Route::get('/query', 'AlbumController@query');

Route::get('/admin', 'HomeController@admin')->middleware('admin');

Route::get('/changePassword','UpdatePasswordController@showChangePasswordForm');
Route::post('/changePassword','UpdatePasswordController@changePassword')->name('changePassword');

