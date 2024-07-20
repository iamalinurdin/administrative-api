<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SubdistrictController;
use Illuminate\Support\Facades\Route;

Route::get('provinces', ProvinceController::class);
Route::get('cities', CityController::class);
Route::get('districts', DistrictController::class);
Route::get('subdistricts', SubdistrictController::class);
