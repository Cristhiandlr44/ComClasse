<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneratedCssController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShortLinkRedirectController;
use App\Http\Controllers\Admin\SiteEditorController;
use App\Http\Controllers\Admin\ShortLinkController;

Route::get('/css/hero-collage.generated.css', [GeneratedCssController::class, 'heroCollage'])->name('css.hero-collage');
Route::get('/css/home-content.generated.css', [GeneratedCssController::class, 'homeContent'])->name('css.home-content');

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

$collageAdminPath = trim((string) config('collage_admin.path'), '/');

Route::prefix($collageAdminPath)->group(function () {
    Route::get('/', [SiteEditorController::class, 'gate'])->name('admin.site.gate');
    Route::post('/login', [SiteEditorController::class, 'login'])->name('admin.site.login');

    Route::middleware('admin.collage')->group(function () {
        Route::get('/editor', [SiteEditorController::class, 'editor'])->name('admin.site.editor');
        Route::get('/links', [ShortLinkController::class, 'index'])->name('admin.site.links');
        Route::post('/links', [ShortLinkController::class, 'store'])->name('admin.site.links.store');
        Route::put('/links/{shortLink}', [ShortLinkController::class, 'update'])->name('admin.site.links.update');
        Route::delete('/links/{shortLink}', [ShortLinkController::class, 'destroy'])->name('admin.site.links.destroy');
        Route::post('/save/collage', [SiteEditorController::class, 'saveCollage'])->name('admin.site.save.collage');
        Route::post('/save/home', [SiteEditorController::class, 'saveHome'])->name('admin.site.save.home');
        Route::post('/upload/collage', [SiteEditorController::class, 'uploadCollage'])->name('admin.site.upload.collage');
        Route::post('/upload/home', [SiteEditorController::class, 'uploadHome'])->name('admin.site.upload.home');
        Route::post('/logout', [SiteEditorController::class, 'logout'])->name('admin.site.logout');
    });
});

Route::get('/{slug}', ShortLinkRedirectController::class)
    ->where('slug', '[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*')
    ->name('short-link.redirect');

