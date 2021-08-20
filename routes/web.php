<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persons', [PersonController::class, 'index'])->name('person.index');
//Route::get('/persons/{id}', [PersonController::class, 'show'])->name('person.show');
Route::get('/persons/create', [PersonController::class, 'create'])->name('person.create');
Route::get('/persons/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
Route::post('/persons', [PersonController::class, 'store'])->name('person.store');
