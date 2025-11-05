<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('WelcomePage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


// Register Page
Route::post('/register', [UserController::class, 'register'])->name('user.register');


/* Vue Pages Stedin  */

Route::get('/index', fn() => Inertia::render('index'))->name('index');

// Nav Project
Route::get('/project', fn() => Inertia::render('Project'))->name('project');

// Nav Product
Route::get('/product', fn() => Inertia::render('Product'))->name('product');

// Nav Gebruikers
Route::get('/gebruikers', fn() => Inertia::render('Gebruikers'))->name('gebruikers');

// Nav Leveranciers
Route::get('/leveranciers', fn() => Inertia::render('Leveranciers'))->name('leveranciers');


