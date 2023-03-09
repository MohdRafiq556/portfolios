<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/project/{project}', [App\Http\Controllers\ProjectController::class, 'user_show'])->name('view_project');

Route::middleware('auth')->group(function() {
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    
});
