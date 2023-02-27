<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/placeholder/{width}/{height}', [\App\Http\Controllers\MainController::class, 'placeholder']);

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/projects', [\App\Http\Controllers\MainController::class, 'projects'])->name('projects');
Route::get('/about-us', [\App\Http\Controllers\MainController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [\App\Http\Controllers\MainController::class, 'services'])->name('services');
Route::get('/contacts', [\App\Http\Controllers\MainController::class, 'contacts'])->name('contacts');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);

Route::get('/admin/contacts', [\App\Http\Controllers\ContactController::class, 'index']);
Route::post('/admin/contacts/create', [\App\Http\Controllers\ContactController::class, 'create']);
Route::get('/admin/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'show']);
Route::post('/admin/contacts/{contact}/edit', [\App\Http\Controllers\ContactController::class, 'edit']);
Route::post('/admin/contacts/{contact}/delete', [\App\Http\Controllers\ContactController::class, 'delete']);

Route::get('/{city:slug}', [\App\Http\Controllers\MainController::class, 'city']);
