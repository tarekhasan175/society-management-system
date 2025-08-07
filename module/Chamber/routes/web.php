<?php

use  Illuminate\Support\Facades\Route;
use Module\Chamber\Controllers\AccountYearController;
use Module\Chamber\Controllers\AssignFeeController;
use Module\Chamber\Controllers\BusinessNatureController;
use Module\Chamber\Controllers\CompanySettingController;
use Module\Chamber\Controllers\FirmStatusController;
use Module\Chamber\Controllers\MemberCategoryController;
use Module\Chamber\Controllers\MembershipController;
use Module\Chamber\Controllers\DistrictController;
use Module\Chamber\Controllers\PaymentHeadController;
use Module\Chamber\Controllers\UpazillaController;


Route::group(['prefix' => 'chamber', 'middleware' => ['auth', 'user']], function () {
   
});


Route::group(['prefix' => 'chamber', 'middleware' => 'chamberadmin'], function () {


    // membership 
    Route::get('/member-list',[MembershipController::class,'memberlist'])->name('membership.memberlist');
    Route::get('/member-create-1',[MembershipController::class,'member_create_1'])->name('membership.member_create_1');
    Route::get('/member-create-2/{id}',[MembershipController::class,'member_create_2'])->name('membership.member_create_2');
    Route::get('/member-create-3/{id}',[MembershipController::class,'member_create_3'])->name('membership.member_create_3');
    Route::get('/member-create-4/{id}',[MembershipController::class,'member_create_4'])->name('membership.member_create_4');

    Route::post('/member-store-1',[MembershipController::class,'member_store_1'])->name('membership.member_store_1');
    Route::post('/member-store-2/{id}',[MembershipController::class,'member_store_2'])->name('membership.member_store_2');
    Route::post('/member-store-3/{id}',[MembershipController::class,'member_store_3'])->name('membership.member_store_3');
    Route::post('/member-store-4/{id}',[MembershipController::class,'member_store_4'])->name('membership.member_store_4');

    Route::get('/member-edit-1/{id}',[MembershipController::class,'member_edit_1'])->name('membership.member_edit_1');
    Route::get('/member-edit-2/{id}',[MembershipController::class,'member_edit_2'])->name('membership.member_edit_2');
    Route::get('/member-edit-3/{id}',[MembershipController::class,'member_edit_3'])->name('membership.member_edit_3');
    Route::get('/member-edit-4/{id}',[MembershipController::class,'member_edit_4'])->name('membership.member_edit_4');

    Route::post('/member-update-1/{id}',[MembershipController::class,'member_update_1'])->name('membership.member_update_1');
    Route::post('/member-update-2/{id}',[MembershipController::class,'member_update_2'])->name('membership.member_update_2');
    Route::post('/member-update-3/{id}',[MembershipController::class,'member_update_3'])->name('membership.member_update_3');
    Route::post('/member-update-4/{id}',[MembershipController::class,'member_update_4'])->name('membership.member_update_4');
    Route::post('/membership-delete/{id}',[MembershipController::class,'delete'])->name('membership.delete');


    // memberCategory 
    Route::get('/create-member-category',[MemberCategoryController::class,'create'])->name('memberCategory.create');
    Route::get('/edit-member-category/{id}',[MemberCategoryController::class,'edit'])->name('memberCategory.edit');
    Route::post('/store-member-category',[MemberCategoryController::class,'store'])->name('memberCategory.store');
    Route::post('/update-member-category/{id}',[MemberCategoryController::class,'update'])->name('memberCategory.update');
    Route::post('/destroy-member-category/{id}',[MemberCategoryController::class,'destroy'])->name('memberCategory.destroy');

    // districts 
    Route::get('/create-districts',[DistrictController::class,'district_create'])->name('districts.create');
    Route::post('/store-district',[DistrictController::class,'store'])->name('districts.store');
    Route::post('/update-district/{id}',[DistrictController::class,'update'])->name('districts.update');
    Route::get('/create-districts',[DistrictController::class,'show'])->name('districts.create');
    Route::get('/edit-districts/{id}',[DistrictController::class,'edit'])->name('districts.edit');
    Route::post('/delete-district/{id}',[DistrictController::class,'destroy'])->name('districts.destroy');

    // upazillas 
    Route::get('/create-subdistrict',[UpazillaController::class,'create'])->name('upazillas.create');
    Route::get('/edit-subdistrict/{id}',[UpazillaController::class,'edit'])->name('upazillas.edit');

    Route::post('/store-subdistrict',[UpazillaController::class,'store'])->name('upazillas.store');
    Route::get('/create-subdistrict',[UpazillaController::class,'show'])->name('upazillas.create');
    Route::post('/update-subdistrict/{id}',[UpazillaController::class,'update'])->name('upazillas.update');
    Route::post('/destroy-subdistrict/{id}',[UpazillaController::class,'destroy'])->name('upazillas.destroy');

    // firmstatus 
    Route::get('/create-firmStatus',[FirmStatusController::class,'create'])->name('firmStatus.create');
    Route::get('/edit-firmStatus/{id}',[FirmStatusController::class,'edit'])->name('firmStatus.edit');
    Route::post('/store-firmStatus',[FirmStatusController::class,'store'])->name('firmStatus.store');
    Route::post('/update-firmStatus/{id}',[FirmStatusController::class,'update'])->name('firmStatus.update');
    Route::post('/delete-firmStatus/{id}',[FirmStatusController::class,'delete'])->name('firmStatus.delete');

    
    // business nature 
    Route::get('/create-business-nature',[BusinessNatureController::class,'create'])->name('businessNature.create');
    Route::get('edit-business-nature/{id}',[BusinessNatureController::class,'edit'])->name('businessNature.edit');
    Route::post('/store-business-nature',[BusinessNatureController::class,'store'])->name('businessNature.store');
    Route::post('/update-business-nature/{id}',[BusinessNatureController::class,'update'])->name('businessNature.update');
    Route::post('/delete-business-nature/{id}',[BusinessNatureController::class,'delete'])->name('businessNature.delete');


    // account year
    Route::get('/create-account-year',[AccountYearController::class,'create'])->name('accountYear.create');
    Route::get('/edit-account-year/{id}',[AccountYearController::class,'edit'])->name('accountYear.edit');
    Route::post('/store-account-year',[AccountYearController::class,'store'])->name('accountYear.store');
    Route::post('/update-accountYear/{id}',[AccountYearController::class,'update'])->name('accountYear.update');
    Route::post('/delete-accountYear/{id}',[AccountYearController::class,'delete'])->name('accountYear.delete');



    //account settings
    Route::get('/create-company-setting',[CompanySettingController::class,'create'])->name('companySetting.create');
    Route::get('/edit-company-setting/{id}',[CompanySettingController::class,'edit'])->name('companySetting.edit');
    Route::get('/list-company-setting',[CompanySettingController::class,'list'])->name('companySetting.list');
    Route::post('/store-company-setting',[CompanySettingController::class,'store'])->name('companySetting.store');
    Route::post('/update-company-setting/{id}',[CompanySettingController::class,'update'])->name('companySetting.update');
    Route::post('/delete-company-setting/{id}',[CompanySettingController::class,'delete'])->name('companySetting.delete');

     // Payment head
     Route::resource('paymentheads',PaymentHeadController::class);
     // Assign Fee
     Route::resource('assignfees',AssignFeeController::class);
     Route::get('/check-assignments',[AssignFeeController::class,'checkAssignments'])->name('check-assignments');
    //  Route::get('/check-assignments', 'AssignFeeController@checkAssignments')->name('check-assignments');




   
});
