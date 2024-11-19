<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    CatalogController,
    ContactController,
    FaqController,
    MonitoringController,
    SitemapController
};

Route::middleware([\App\Http\Middleware\SecurityHeaders::class])->group(function () {
    Route::prefix('monitoring')->middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [MonitoringController::class, 'index'])->name('monitoring.index');
        Route::get('/performance', [MonitoringController::class, 'performance'])->name('monitoring.performance');
        Route::get('/errors', [MonitoringController::class, 'errors'])->name('monitoring.errors');
        Route::get('/seo', [MonitoringController::class, 'seo'])->name('monitoring.seo');
    });
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
    Route::get('/catalog/{category:slug}', [CatalogController::class, 'category'])->name('catalog.category');
    Route::get('/catalog/{category:slug}/{product:slug}', [CatalogController::class, 'product'])->name('catalog.product');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('sitemap.xml', [SitemapController::class, 'index']);
    Route::get('/robots.txt', function () {
        $content = [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            'Disallow: /login',
            'Disallow: /register',
            'Disallow: /password/*',
            '',
            'Sitemap: ' . url('sitemap.xml'),
        ];

        return response(implode(PHP_EOL, $content))
            ->header('Content-Type', 'text/plain');
    });
});
