<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SmsOTPController;
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


Auth::routes();



Route::post('push', 'AttendanceDeviceApi\LogController@push');



Route::group(['prefix' => 'password-reset', 'namespace' => 'Auth', 'as' => 'password-reset.'], function () {
    Route::post('send-email', 'LoginController@sendPasswordResetEmail')->name('send-email');
    Route::get('verify-token', 'LoginController@verifyResetPasswordToken')->name('verify-token');
    Route::post('reset-password', 'LoginController@updateUserPassword')->name('update-password');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


    Route::get('user/password/edit', 'UserController@changePassword')->name('user.password.edit');
    Route::post('user/password/edit', 'UserController@updatePassword')->name('user.password.update');
    // only access for super admin which id is 1
    Route::get('user/change/password/{id}', 'UserController@AdminChangePassword')->name('admin.edit.password');
    Route::post('user/change/password', 'UserController@AdminUpdatePassword')->name('admin.update.password');

    Route::get('db-backup', 'DatabaseBackupController@db_backup')->name('db-backup');
    Route::resource('group', 'GroupController');
    Route::get('/print-groups', 'GroupController@printGroups')->name('print.groups');
    Route::resource('company', 'CompanyController');


    Route::resource('id-card-settings', 'IdCardSettingController');

    Route::resource('currency-conversions', 'CurrencyConversionController');



    Route::resource('system-setting', 'SystemSettingController');


    Route::group(['prefix' => 'global-setting'], function () {
        Route::resource('suppliers', 'SupplierController');
        Route::resource('supplier-types', 'SupplierTypeController');
    });





    // end inventory module

    // smart soft payment
    Route::group(['middleware' => 'super-admin'], function () {
        Route::get('smart-soft-payments/alert', 'SmartSoftPaymentScheduleController@ajaxAlert')->name('smart-soft-payments.alert');
        Route::resource('smart-soft-payments', 'SmartSoftPaymentScheduleController');
    });

    Route::post('payment/feedback', 'SmartSoftPaymentScheduleController@feedback')->name('smart-soft-payments.feedback');


    Route::get('add-user', 'UserController@addUserFromEmployee');



    /// dashboard data load related routes
    Route::get('get-commercial-dashboard-data', 'HomeController@getCommercialDashboardData')->name('get-commercial-dashboard-data');
    Route::get('get-inventory-dashboard-data',  'HomeController@getInventoryDashboardData')->name('get-inventory-dashboard-data');
    Route::get('get-payment-dashboard-data',    'HomeController@getPaymentDashboardData')->name('get-payment-dashboard-data');

    Route::get('lang/{locale}', function ($locale) {
        session(['locale' => $locale]);
        return redirect()->back();
    })->name('lang.switch');
});



Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

Route::resource('sms_otp', 'SmsOTPController');
Route::post('validation_check', [RegisterController::class, 'validationCheck']);
Route::post('phone_otp_check', [SmsOTPController::class, 'checkPhoneOTP']);
