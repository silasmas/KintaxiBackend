<?php
/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Default API Routes
|--------------------------------------------------------------------------
*/
Route::middleware('localization')->group(function () {
    Route::apiResource('ride', 'App\Http\Controllers\API\RideController');
});
/*
|--------------------------------------------------------------------------
| Custom API resource
|--------------------------------------------------------------------------
 */
Route::group(['middleware' => ['api', 'localization']], function () {
    Route::resource('ride', 'App\Http\Controllers\API\RideController');

    Route::get('ride/rides_by_status/{status}', 'App\Http\Controllers\API\RideController@ridesByStatus')->name('ride.api.rides_by_status');
});
