<?php

// use App\Http\Controllers\Api\V1\CategoryController;
// use App\Http\Controllers\Api\V1\ProductController;

// use App\Http\Controllers\Api\V1\CrowdFundController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// localhost:8000/api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('products', ProductController::class);
    Route::apiResource('crowd-funds', CrowdFundController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('investments', InvestmentController::class);
    Route::apiResource('agronomists', AgronomistController::class);
    Route::apiResource('farms', FarmController::class);


    // Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);
});