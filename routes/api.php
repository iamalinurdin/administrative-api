<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SubdistrictController;
use Illuminate\Support\Facades\Route;

// Route::get('provinces', ProvinceController::class);

Route::apiResource('provinces', ProvinceController::class);
Route::apiResource('cities', CityController::class);
Route::apiResource('districts', DistrictController::class);
Route::apiResource('subdistricts', SubdistrictController::class);
