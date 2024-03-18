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

    Route::get(RouteNavigator::PERMISSIONS,[PermissionController::class, 'index'])->name(navigator(RouteNavigator::PERMISSIONS)->index);
    Route::post(RouteNavigator::PERMISSIONS,[PermissionController::class, 'store'])->name(navigator(RouteNavigator::PERMISSIONS)->store);
    Route::put(RouteNavigator::PERMISSIONS,[PermissionController::class, 'update'])->name(navigator(RouteNavigator::PERMISSIONS)->update);
    Route::delete(RouteNavigator::PERMISSIONS,[PermissionController::class, 'delete'])->name(navigator(RouteNavigator::PERMISSIONS)->delete);

    Route::get(RouteNavigator::ROLES,[RoleController::class, 'index'])->name(navigator(RouteNavigator::ROLES)->index);
    Route::post(RouteNavigator::ROLES,[RoleController::class, 'store'])->name(navigator(RouteNavigator::ROLES)->store);
    Route::put(RouteNavigator::ROLES,[RoleController::class, 'update'])->name(navigator(RouteNavigator::ROLES)->update);
    Route::delete(RouteNavigator::ROLES,[RoleController::class, 'delete'])->name(navigator(RouteNavigator::ROLES)->delete);

    Route::get(RouteNavigator::USERS,[UserController::class, 'index'])->name(navigator(RouteNavigator::USERS)->index);
    Route::post(RouteNavigator::USERS,[UserController::class, 'store'])->name(navigator(RouteNavigator::USERS)->store);
    Route::put(RouteNavigator::USERS,[UserController::class, 'update'])->name(navigator(RouteNavigator::USERS)->update);
    Route::delete(RouteNavigator::USERS,[UserController::class, 'delete'])->name(navigator(RouteNavigator::USERS)->delete);

});

require __DIR__.'/auth.php';
