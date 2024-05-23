<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController; //add \Admin to path

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        //all route here that needs to be protected by our auth system
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('//home', [DashboardController::class, 'home'])->name('home');

        Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']); //ADD slugs instead of ID in URL with ->parameters(['names'=>'name:slug'])

        Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
