<?php

use App\Http\Controllers\ProjectController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'index'])->name('search');


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

// Nav Project.index
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');

// Nav Product
Route::get('/product', fn() => Inertia::render('Product'))->name('product.index');

// Nav Gebruikers
Route::get('/gebruikers', fn() => Inertia::render('Gebruikers'))->name('gebruikers.index');

// Nav Leveranciers.index
Route::get('/leveranciers', [SupplierController::class, 'index'])->name('leveranciers.index');

// Nav Winkelwagen
Route::get('/winkelwagen', fn() => Inertia::render('Winkelwagen'))->name('winkelwagen.index');


// Supplier Management

// Show create supplier page
Route::get('/leverancier/create', [SupplierController::class, 'create'])->name('leveranciers.create');

// Save supplier page
Route::post('/leverancier', [SupplierController::class, 'store'])->name('leveranciers.store');

// Show edit form supplier page
Route::get('/leveranciers/{supplier}/edit', [SupplierController::class, 'edit'])->name('leveranciers.edit');

// Update supplier
Route::put('/leveranciers/{supplier}', [SupplierController::class, 'update'])->name('leveranciers.update');

// Delete supplier
Route::delete('/leveranciers/{supplier}', [SupplierController::class, 'destroy'])->name('leveranciers.destroy');


// Project Management

// Show create project page
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');

// Save project page
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');

// Show edit form project page
Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');

// Update project
Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');

// Delete project
Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');


// User Management



