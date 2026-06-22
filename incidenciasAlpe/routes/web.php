<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('back.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del Panel de Administración (Back) - Protegidas por Auth
Route::prefix('back')->middleware(['auth'])->group(function () {
    Route::get('/', [BackController::class, 'index'])->name('back.index');
    
    // Recursos CRUD Completos
    Route::resource('incidencias', IncidenciaController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('aulas', AulaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('comentarios', ComentarioController::class);
});

require __DIR__.'/auth.php';
