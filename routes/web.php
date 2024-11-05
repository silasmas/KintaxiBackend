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
    Route::get('/customer', 'App\Http\Controllers\Web\HomeController@customer')->name('customer');
    Route::post('/customer', 'App\Http\Controllers\Web\HomeController@addCustomer');
    Route::get('/customer/{id}', 'App\Http\Controllers\Web\HomeController@customerDatas')->whereNumber('id')->name('customer.datas');
    Route::post('/customer/{id}', 'App\Http\Controllers\Web\HomeController@updateCustomer')->whereNumber('id');
    Route::delete('/customer/{id}', 'App\Http\Controllers\Web\HomeController@removeCustomer')->whereNumber('id');
    Route::get('/customer/{entity}', 'App\Http\Controllers\Web\HomeController@customerEntity')->name('customer.entity');
    Route::get('/currency', 'App\Http\Controllers\Web\HomeController@currency')->name('currency');
    Route::post('/currency', 'App\Http\Controllers\Web\HomeController@addCurrency');
    Route::get('/currency/{id}', 'App\Http\Controllers\Web\HomeController@currencyDatas')->whereNumber('id')->name('currency.datas');
    Route::post('/currency/{id}', 'App\Http\Controllers\Web\HomeController@updateCurrency')->whereNumber('id');
    Route::delete('/currency/{id}', 'App\Http\Controllers\Web\HomeController@removeCurrency')->whereNumber('id');
    Route::get('/payment-gateway', 'App\Http\Controllers\Web\HomeController@gateway')->name('payment_gateway');
    Route::post('/payment-gateway', 'App\Http\Controllers\Web\HomeController@addGateway');
    Route::get('/payment-gateway/{id}', 'App\Http\Controllers\Web\HomeController@gatewayDatas')->whereNumber('id')->name('payment_gateway.datas');
    Route::post('/payment-gateway/{id}', 'App\Http\Controllers\Web\HomeController@updateGateway')->whereNumber('id');
    Route::delete('/payment-gateway/{id}', 'App\Http\Controllers\Web\HomeController@removeGateway')->whereNumber('id');
    Route::get('/vehicle', 'App\Http\Controllers\Web\HomeController@vehicle')->name('vehicle');
    Route::post('/vehicle', 'App\Http\Controllers\Web\HomeController@addVehicle');
    Route::get('/vehicle/{id}', 'App\Http\Controllers\Web\HomeController@vehicleDatas')->whereNumber('id')->name('vehicle.datas');
    Route::post('/vehicle/{id}', 'App\Http\Controllers\Web\HomeController@updateVehicle')->whereNumber('id');
    Route::delete('/vehicle/{id}', 'App\Http\Controllers\Web\HomeController@removeVehicle')->whereNumber('id');
    Route::get('/vehicle/{entity}', 'App\Http\Controllers\Web\HomeController@vehicleEntity')->name('vehicle.entity');
    Route::post('/vehicle/{entity}', 'App\Http\Controllers\Web\HomeController@addVehicleEntity');
    Route::get('/vehicle/{entity}/{id}', 'App\Http\Controllers\Web\HomeController@vehicleEntityDatas')->whereNumber('id')->name('vehicle.entity.datas');
    Route::post('/vehicle/{entity}/{id}', 'App\Http\Controllers\Web\HomeController@updateVehicleEntity')->whereNumber('id');
    Route::delete('/vehicle/{entity}/{id}', 'App\Http\Controllers\Web\HomeController@removeVehicleEntity')->whereNumber('id');
    Route::get('/role', 'App\Http\Controllers\Web\HomeController@role')->name('role');
    Route::post('/role', 'App\Http\Controllers\Web\HomeController@addRole');
    Route::get('/role/{id}', 'App\Http\Controllers\Web\HomeController@roleDatas')->whereNumber('id')->name('role.datas');
    Route::post('/role/{id}', 'App\Http\Controllers\Web\HomeController@updateRole')->whereNumber('id');
    Route::delete('/role/{id}', 'App\Http\Controllers\Web\HomeController@removeRole')->whereNumber('id');
    Route::get('/role/{entity}', 'App\Http\Controllers\Web\HomeController@roleEntity')->name('role.entity');
    Route::post('/role/{entity}', 'App\Http\Controllers\Web\HomeController@addRoleEntity');
    Route::get('/role/{entity}/{id}', 'App\Http\Controllers\Web\HomeController@roleEntityDatas')->whereNumber('id')->name('role.entity.datas');
    Route::post('/role/{entity}/{id}', 'App\Http\Controllers\Web\HomeController@updateRoleEntity')->whereNumber('id');
    Route::delete('/role/{entity}/{id}', 'App\Http\Controllers\Web\HomeController@removeRoleEntity')->whereNumber('id');
    Route::get('/status', 'App\Http\Controllers\Web\HomeController@status')->name('status');
    Route::post('/status', 'App\Http\Controllers\Web\HomeController@addStatus');
    Route::get('/status/{id}', 'App\Http\Controllers\Web\HomeController@statusDatas')->whereNumber('id')->name('status.datas');
    Route::post('/status/{id}', 'App\Http\Controllers\Web\HomeController@updateStatus')->whereNumber('id');
    Route::delete('/status/{id}', 'App\Http\Controllers\Web\HomeController@deleteStatus')->whereNumber('id');
    // Account
    Route::get('/account', 'App\Http\Controllers\Web\AccountController@account')->name('account');
    Route::post('/account', 'App\Http\Controllers\Web\AccountController@updateAccount');
    Route::get('/account/{entity}', 'App\Http\Controllers\Web\AccountController@accountEntity')->name('account.entity');
    Route::post('/account/{entity}', 'App\Http\Controllers\Web\AccountController@updateAccountEntity');
});

require __DIR__.'/auth.php';
