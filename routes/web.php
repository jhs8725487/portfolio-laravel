<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectTypeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('project-types', ProjectTypeController::class)->except('show');
     Route::resource('projects', ProjectController::class)->except('show');
});

Route::get('/sitemap.xml', function () {
    $projects = \App\Models\Project::published()->get();

    return response()
        ->view('sitemap', compact('projects'))
        ->header('Content-Type', 'text/xml');
});

Route::get('/proyectos/{project:slug}', [PublicController::class, 'showProject'])->name('projects.show');

require __DIR__.'/auth.php';
