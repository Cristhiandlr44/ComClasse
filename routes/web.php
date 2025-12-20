<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/servicos', [HomeController::class, 'servicos'])->name('servicos');
Route::get('/contato', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store');
Route::post('/orcamento', [ContactController::class, 'budget'])->name('contact.budget');
Route::get('/questionario', [ContactController::class, 'questionnaire'])->name('contact.questionnaire');
Route::post('/questionario', [ContactController::class, 'questionnaireStore'])->name('contact.questionnaire.store');
Route::get('/login', function () {
    return view('login');
})->name('login');

