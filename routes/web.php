<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('user', UserController::class)->middleware('admin');

Route::controller(TaskController::class)->group(function(){
    Route::get('/task','index')->name('task.index');
    Route::get('/task/create','create')->name('task.index');
    Route::post('/task','store')->name('task.store');
    Route::get('/task/{task}','show')->name('task.show');
    Route::get('/task/{task}/edit','edit')->name('task.edit');
    Route::put('/task/{task}','update')->name('task.update');
    Route::delete('/task/{task}','destroy')->name('task.destroy');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/language/{lang}', [LanguageController::class, 'changePreferredLanguage'])->name('language');

require __DIR__.'/auth.php';
