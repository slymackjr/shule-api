<?php

use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\SchoolRequestController;
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

// Routes for fetching regions, districts, and wards
Route::get('/regions', [ResourcesController::class, 'regions'])->name('regions');
Route::get('/district', [ResourcesController::class, 'districts'])->name('districts');
Route::get('/wards', [ResourcesController::class, 'wards'])->name('wards');

Route::post("/school-registration", [SchoolRequestController::class, 'store'])->name('schoolrequest.store');


