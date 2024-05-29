<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\Admin\TechnologiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])
                ->prefix('admin')
                ->name('admin.')
                ->group(function(){
                    Route::get('/', [DashboardController::class, 'index'])->name('home');
                    Route::resource('projects', ProjectsController::class);
                    Route::resource('types', TypesController::class);
                    Route::resource('technologies', TechnologiesController::class);
                    Route::get('type-projects', [TypesController::class, 'typeProjects'])->name('type_projects');
                    Route::post('filter', [ProjectsController::class, 'filter'])->name('filter');
                });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
