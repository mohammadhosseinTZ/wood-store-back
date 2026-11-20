<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeOptionsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource("categories", CategoryController::class);
Route::apiResource("attributes", AttributeController::class);

Route::post("/attributes/{attribute}/options", [AttributeOptionsController::class, "store"]);
Route::delete("/attributes/{attributeOptions}/options", [AttributeOptionsController::class, "destroy"]);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
