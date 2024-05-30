<?php

// Importación de los controladores y la clase Route de Laravel
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicationController;
use Illuminate\Support\Facades\Route;

// Definición de la ruta para la página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Definición de un grupo de rutas protegidas por autenticación
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Ruta para el panel de control, utiliza el DashboardController
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Rutas para la gestión de medicamentos
    Route::get('/medications', [MedicationController::class, 'index'])->name('medications.index');
    Route::get('/medications/create', [MedicationController::class, 'create'])->name('medications.create');
    Route::post('/medications', [MedicationController::class, 'store'])->name('medications.store');
    Route::get('/medications/{medication}', [MedicationController::class, 'show'])->name('medications.show');
    Route::get('/medications/{medication}/edit', [MedicationController::class, 'edit'])->name('medications.edit');
    Route::put('/medications/{medication}', [MedicationController::class, 'update'])->name('medications.update');
    Route::delete('/medications/{medication}', [MedicationController::class, 'destroy'])->name('medications.destroy');
});
