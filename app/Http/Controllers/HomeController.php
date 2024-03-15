<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class HomeController extends Controller
{

    function home(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    function dashboard(){
        return Inertia::render('Dashboard', User::getSelects());
    }

    function permissionDeneid(){
        return Inertia::render('PermissionDenied');
    }

    function notFound(){
        return Inertia::render('NotFound');
    }

}
