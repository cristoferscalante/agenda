<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProfesionalDeSaludController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),        
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/** Agregamos la ruta "prueba" **/
Route::get('/prueba', function () {
    return Inertia::render('Auth/Prueba');
})->name('prueba');

/** Rutas existentes **/
Route::resource('profesionales', ProfesionalDeSaludController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('citas', CitaController::class);

require __DIR__.'/auth.php';

/**React**/
Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
Route::get('/citas/create', [CitaController::class, 'create'])->name('citas.create');
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');