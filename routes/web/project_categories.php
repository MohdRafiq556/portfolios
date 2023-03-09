<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin','auth'])->group(function() {
    Route::get('/project_categories', [App\Http\Controllers\ProjectCategoriesController::class, 'index'])->name('project_categories.index');
    Route::get('/project_categories/create', [App\Http\Controllers\ProjectCategoriesController::class, 'create'])->name('project_category.create');
    Route::post('/project_categories/store', [App\Http\Controllers\ProjectCategoriesController::class, 'store'])->name('project_category.store');

    Route::delete('/project_categories/{project_category}/destroy', [App\Http\Controllers\ProjectCategoriesController::class, 'destroy'])->name('project_category.destroy');
    Route::get('/project_categories/{project_category}/edit', [App\Http\Controllers\ProjectCategoriesController::class, 'edit'])->name('project_category.edit');
    Route::patch('/project_categories/{project_category}/update', [App\Http\Controllers\ProjectCategoriesController::class, 'update'])->name('project_category.update');



});








