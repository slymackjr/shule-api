<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\SchoolRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.sanctum.teacher')->get('/teacher-login', function (Request $request) {
    return response()->json(['teacher' => $request->user()]); // Return authenticated user details
});
Route::middleware('auth.sanctum.parent')->get('/parent/dashboard', function (Request $request) {
    return $request->user(); // Return parent details
});
Route::middleware('auth.sanctum.admin')->get('/admin/dashboard', function (Request $request) {
    return $request->user(); // Return admin details
});

// Routes for fetching regions, districts, and wards
Route::get('/regions', [ResourcesController::class, 'regions'])->name('regions');
Route::get('/district', [ResourcesController::class, 'districts'])->name('districts');
Route::get('/wards', [ResourcesController::class, 'wards'])->name('wards');
Route::post("/school-registration", [SchoolRequestController::class, 'store'])->name('schoolrequest.store');
Route::post('/teacher-login', [LoginController::class, 'authenticateTeacher'])->name('login.auth');
