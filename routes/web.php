<?php
/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Generate symbolic link
Route::get('/symlink', 'App\Http\Controllers\Web\HomeController@symlink')->name('generate_symlink');
// Channge language
Route::get('/change-language/{locale}', 'App\Http\Controllers\Web\HomeController@changeLanguage')->name('change_language');
// Dashboard
Route::middleware('auth')->group(function () {
    // Home
    Route::get('/', 'App\Http\Controllers\Web\HomeController@index')->name('home');
    Route::get('/about', 'App\Http\Controllers\Web\HomeController@about')->name('about');
    Route::get('/search', 'App\Http\Controllers\Web\HomeController@search')->name('search');
    Route::get('/customer', 'App\Http\Controllers\Web\CustomerController@index')->name('customer.home');
    Route::post('/customer', 'App\Http\Controllers\Web\CustomerController@store');
    Route::get('/customer/{id}', 'App\Http\Controllers\Web\CustomerController@show')->whereNumber('id')->name('customer.show');
    Route::post('/customer/{id}', 'App\Http\Controllers\Web\CustomerController@update')->whereNumber('id');
    Route::get('/customer/delete/{id}', 'App\Http\Controllers\Web\CustomerController@destroy')->whereNumber('id')->name('customer.destroy');
    Route::get('/currency', 'App\Http\Controllers\Web\CurrencyController@index')->name('currency.home');
    Route::post('/currency', 'App\Http\Controllers\Web\CurrencyController@store');
    Route::get('/currency/{id}', 'App\Http\Controllers\Web\CurrencyController@show')->whereNumber('id')->name('currency.show');
    Route::post('/currency/{id}', 'App\Http\Controllers\Web\CurrencyController@update')->whereNumber('id');
    Route::get('/currency/delete/{id}', 'App\Http\Controllers\Web\CurrencyController@destroy')->whereNumber('id')->name('currency.destroy');
    Route::get('/payment-gateway', 'App\Http\Controllers\Web\PaymentGatewayController@index')->name('payment_gateway.home');
    Route::post('/payment-gateway', 'App\Http\Controllers\Web\PaymentGatewayController@store');
    Route::get('/payment-gateway/{id}', 'App\Http\Controllers\Web\PaymentGatewayController@show')->whereNumber('id')->name('payment_gateway.show');
    Route::post('/payment-gateway/{id}', 'App\Http\Controllers\Web\PaymentGatewayController@update')->whereNumber('id');
    Route::get('/payment-gateway/delete/{id}', 'App\Http\Controllers\Web\PaymentGatewayController@destroy')->whereNumber('id')->name('payment_gateway.destroy');
    Route::get('/vehicle', 'App\Http\Controllers\Web\VehicleController@index')->name('vehicle.home');
    Route::post('/vehicle', 'App\Http\Controllers\Web\VehicleController@store');
    Route::get('/vehicle/{id}', 'App\Http\Controllers\Web\VehicleController@show')->whereNumber('id')->name('vehicle.show');
    Route::post('/vehicle/{id}', 'App\Http\Controllers\Web\VehicleController@update')->whereNumber('id');
    Route::get('/vehicle/delete/{id}', 'App\Http\Controllers\Web\VehicleController@destroy')->whereNumber('id')->name('vehicle.destroy');
    Route::get('/vehicle/{entity}', 'App\Http\Controllers\Web\VehicleController@indexEntity')->name('vehicle.entity.home');
    Route::post('/vehicle/{entity}', 'App\Http\Controllers\Web\VehicleController@storeEntity');
    Route::get('/vehicle/{entity}/{id}', 'App\Http\Controllers\Web\VehicleController@showEntity')->whereNumber('id')->name('vehicle.entity.show');
    Route::post('/vehicle/{entity}/{id}', 'App\Http\Controllers\Web\VehicleController@updateEntity')->whereNumber('id');
    Route::get('/vehicle/delete/{entity}/{id}', 'App\Http\Controllers\Web\VehicleController@destroyEntity')->whereNumber('id')->name('vehicle.entity.destroy');
    Route::get('/role', 'App\Http\Controllers\Web\RoleController@index')->name('role.home');
    Route::post('/role', 'App\Http\Controllers\Web\RoleController@store');
    Route::get('/role/{id}', 'App\Http\Controllers\Web\RoleController@show')->whereNumber('id')->name('role.show');
    Route::post('/role/{id}', 'App\Http\Controllers\Web\RoleController@update')->whereNumber('id');
    Route::get('/role/delete/{id}', 'App\Http\Controllers\Web\RoleController@destroy')->whereNumber('id')->name('role.destroy');
    Route::get('/role/{entity}', 'App\Http\Controllers\Web\RoleController@indexEntity')->name('role.entity.home');
    Route::post('/role/{entity}', 'App\Http\Controllers\Web\RoleController@storeEntity');
    Route::get('/role/{entity}/{id}', 'App\Http\Controllers\Web\RoleController@showEntity')->whereNumber('id')->name('role.entity.show');
    Route::post('/role/{entity}/{id}', 'App\Http\Controllers\Web\RoleController@updateEntity')->whereNumber('id');
    Route::get('/role/delete/{entity}/{id}', 'App\Http\Controllers\Web\RoleController@destroyEntity')->whereNumber('id')->name('role.entity.destroy');
    Route::get('/status', 'App\Http\Controllers\Web\StatusController@index')->name('status.home');
    Route::post('/status', 'App\Http\Controllers\Web\StatusController@store');
    Route::get('/status/{id}', 'App\Http\Controllers\Web\StatusController@show')->whereNumber('id')->name('status.show');
    Route::post('/status/{id}', 'App\Http\Controllers\Web\StatusController@update')->whereNumber('id');
    Route::get('/status/delete/{id}', 'App\Http\Controllers\Web\StatusController@destroy')->whereNumber('id')->name('status.destroy');
    // Account
    Route::get('/account', 'App\Http\Controllers\Web\AccountController@index')->name('account');
    Route::post('/account', 'App\Http\Controllers\Web\AccountController@update');
    Route::get('/account/{entity}', 'App\Http\Controllers\Web\AccountController@indexEntity')->name('account.entity');
    Route::post('/account/{entity}', 'App\Http\Controllers\Web\AccountController@updateEntity');
});

require __DIR__.'/auth.php';
