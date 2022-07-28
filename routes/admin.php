<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\FacilitiesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubServiceController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('dashboard.index');
});

Route::group(['prefix'=>'dashboard'],function (){
    Route::resource('/banners'               ,BannerController::class);
    Route::resource('/cities'                ,CityController::class);
    Route::resource('/clinics'               ,ClinicController::class);
    Route::resource('/facilities'            ,FacilitiesController::class);
    Route::resource('/subServices'           ,SubServiceController::class);
    Route::resource('/services'              ,ServiceController::class);
});
