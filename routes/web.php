<?php

use App\Enum\Concrect\RouteNavigator;
use App\Http\Controllers\{
    HomeController,
    RoleController,
    PermissionController,
    UserController,
};

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

Route::get('/', [HomeController::class, 'home'])->name("home");
Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name(RouteNavigator::DASHBOARD);

Route::middleware('auth')->group(function () {
    Route::get('/permission-deneid', [HomeController::class, 'permissionDeneid'])->name(RouteNavigator::PERMISSION_DENEID);
    Route::get('/not-found', [HomeController::class, 'notFound'])->name(RouteNavigator::NOT_FOUND);

    Route::resource(RouteNavigator::ROLES, RoleController::class);
    Route::resource(RouteNavigator::PERMISSIONS, PermissionController::class);
    Route::resource(RouteNavigator::USERS, UserController::class);
});

require __DIR__.'/auth.php';
