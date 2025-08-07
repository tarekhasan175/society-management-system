<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'production'], function () {
    Route::resource('factories', 'FactoryController');
    Route::resource('materials-assign', 'RawMaterialsController');

});

// Ajax Call
Route::get('factories-data', 'RawMaterialsController@getFactoryData')->name('ajax.factories');
Route::get('is-approved/{id}', 'RawMaterialsController@is_approved')->name('is.approved');
// Route::get('test/{id}', 'RawMaterialsController@test');
