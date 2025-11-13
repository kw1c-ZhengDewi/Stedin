<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;

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

// Nav Project
Route::get('/project', fn() => Inertia::render('Project'))->name('project');

// Nav Product
Route::get('/product', fn() => Inertia::render('Product'))->name('product');

// Nav Gebruikers
Route::get('/gebruikers', fn() => Inertia::render('Gebruikers'))->name('gebruikers');

// Nav Leveranciers (Laten liggen?)
Route::get('/leveranciers', fn() => Inertia::render('Leveranciers'))->name('leveranciers');

// Nav Winkelwagen
Route::get('/winkelwagen', fn() => Inertia::render('Winkelwagen'))->name('winkelwagen');


// Supplier Management

// Import or add new suppliers

// Maak een nieuw leverancier Pagina
Route::get('/leveranciers', [SupplierController::class, 'index'])->name('leveranciers.index');

// Gegevens ontvangen vanaf nieuw_leverancier pagina
Route::post('/leveranciers', [SupplierController::class, 'store'])->name('leveranciers.store');

// Toont alle leveranciers
Route::get('/lijst_leveranciers', [SupplierController::class, 'display'])->name('leveranciers.display');

// Toon leverancier bewerkingsformulier
Route::get('/leveranciers/{supplier}/edit', [SupplierController::class, 'edit'])->name('leveranciers.edit');

// Verwerk het indienen van een bewerkingsformulier
Route::put('/leveranciers/{supplier}', [SupplierController::class, 'update'])->name('leveranciers.update');

// Verwijder leverancier route
Route::delete('/leveranciers/{supplier}', [SupplierController::class, 'destroy'])->name('leveranciers.destroy');

