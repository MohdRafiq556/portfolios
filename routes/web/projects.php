<?php

use Illuminate\Support\Facades\Route;

    Route::get('/project/view-project/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('project');

    Route::middleware(['role:admin','auth'])->group(function() {
        Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
        Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
        Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');

        Route::delete('/projects/{project}/destroy', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
        Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
        Route::patch('/projects/{project}/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    
    
    
    });




