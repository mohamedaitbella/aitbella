<?php

use Aitbella\Cosmed\Controllers\ConfigurationController;
use Illuminate\Support\Facades\Route;
use Aitbella\Cosmed\Controllers\ContactController;

Route::get('/cosmed-contact.html',[ContactController ::class,"index"])->name('contacts.show')->middleware("web");
Route::post('/cosmed-contact.html',[ContactController::class,"store"])->name('contacts.store')->middleware("web");

Route::middleware(['web','auth'])->group(function () {
 
    Route::get('/dashboard/configuration',[ConfigurationController::class,"index"])->name('configuration.index');
    Route::Put('/dashboard/configuration',[ConfigurationController::class,"update"])->name('configuration.update');

    Route::get('/dashboard/contacts',[ContactController::class,"show"])->middleware([])->name('contact.show');
    Route::get('/dashboard/contacts/export',[ContactController::class,"export"])->middleware(['auth', 'verified'])->name('contact.export');

});