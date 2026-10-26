<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\QuoteRequestController as AdminQuoteRequestController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PoleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');

// Pôles d'expertise (Équipements Médicaux, Mobilier, Génie Civil)
Route::get('/nos-poles', [PoleController::class, 'index'])->name('poles.index');
Route::get('/nos-poles/{sector}', [PoleController::class, 'show'])->name('poles.show');

// Catalogue Produits & Solutions
Route::get('/catalogue', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalogue/{product}', [CatalogController::class, 'show'])->name('catalog.show');

// Réalisations / Références
Route::get('/realisations', [ProjectController::class, 'index'])->name('projects.index');

// Devis & Contact
Route::get('/devis-contact', [QuoteRequestController::class, 'create'])->name('contact.create');
Route::post('/devis-contact', [QuoteRequestController::class, 'store'])
    ->middleware('throttle:quotes')
    ->name('contact.store');

// Authentification Administration
Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('/connexion', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/connexion', [AuthController::class, 'login'])
            ->middleware('throttle:login')
            ->name('login.submit');
    });

    Route::middleware('auth')->group(function (): void {
        Route::post('/deconnexion', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('produits', AdminProductController::class)
            ->parameters(['produits' => 'product'])
            ->except(['show'])
            ->names('products');

        Route::resource('realisations', AdminProjectController::class)
            ->parameters(['realisations' => 'project'])
            ->only(['index', 'create', 'store', 'destroy'])
            ->names('projects');

        Route::resource('demandes', AdminQuoteRequestController::class)
            ->parameters(['demandes' => 'quote'])
            ->only(['index', 'show', 'update', 'destroy'])
            ->names('quotes');
    });
});

// Redirect Laravel's default login route name to admin.login
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
