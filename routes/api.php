<?php

use App\Http\Controllers\API\CashController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['coupon' => 'App\Http\Controllers\API\CouponController']);
Route::get('coupon', 'App\Http\Controllers\API\CouponController@walletAmount');
Route::post('cash', 'App\Http\Controllers\API\CashController@storecash');
Route::get('cash', 'App\Http\Controllers\API\CashController@showtotal');
Route::post('cash', 'App\Http\Controllers\API\CashController@transferFunds');
Route::get('dashboard', 'App\Http\Controllers\API\DashboardController@index');

Route::get('dashboard', 'App\Http\Controllers\API\DashboardController@alltimebal');
Route::get('dashboardd', 'App\Http\Controllers\API\DashboardController@alltimeTransfer');
Route::get('dashboarrec', 'App\Http\Controllers\API\DashboardController@receiveTransfer');
Route::get('dashboar_revenue', 'App\Http\Controllers\API\DashboardController@allRevenue');
Route::get('history', 'App\Http\Controllers\API\DashboardController@getHistory');
Route::get('viewhistory', 'App\Http\Controllers\API\HistoryDetailsController@fetchHistory');
Route::get('profile', 'App\Http\Controllers\API\HistoryDetailsController@fetchProfile');
// Route::get('viewhistory', 'App\Http\Controllers\API\HistoryDetailsController@index');
Route::post('ticket', 'App\Http\Controllers\API\TicketController@store');
Route::post('profileupdate', 'App\Http\Controllers\API\ProfileUpdateController@updateProfile');
Route::post('uploadphoto', 'App\Http\Controllers\API\ProfileUpdateController@updatePhoto');
Route::post('uploadimage', 'App\Http\Controllers\API\ProfileUpdateController@updateImage');
Route::post('setting', 'App\Http\Controllers\API\ProfileUpdateController@saveSetting');
Route::get('getsetting', 'App\Http\Controllers\API\ProfileUpdateController@fetchSetting');






//Route::post(['cash' => CashController::class]);


